<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Transaction extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model');
    } 

    /*
     * Listing of tb_am_transactions
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tb_am_transaction/index?');
        $config['total_rows'] = $this->Transaction_model->get_all_tb_am_transactions_count();
        $this->pagination->initialize($config);

        //get_all_tb_am_transactions
        $data['tb_am_transactions'] = $this->Transaction_model->get_join_depots($params);
        
        $data['_view'] = 'transaction/index';
        $this->load->view('layouts/main',$data);
    }

    function retrait()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tb_am_transaction/retrait?');
        $config['total_rows'] = $this->Transaction_model->get_all_tb_am_transactions_count();
        $this->pagination->initialize($config);

        //get_all_tb_am_transactions
        $data['tb_am_transactions'] = $this->Transaction_model->get_join_retraits($params);
        
    
        $data['_view'] = 'transaction/retrait';
        $this->load->view('layouts/main',$data);
    }
    /*
     * Adding a new tb_am_transaction
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('transac_code','Transac Code','required|is_unique[tb_am_transactions.transac_code]|max_length[10]');
		$this->form_validation->set_rules('destination','Destination','required');
		$this->form_validation->set_rules('client_sid','Client Sid','required');
        $this->form_validation->set_rules('client_benef','Client Benef','required');
		$this->form_validation->set_rules('provenance','Provenance','required');
		
        $this->form_validation->set_rules('transac_montant','transac_montant','required|numeric');
        $this->form_validation->set_rules('transac_pourc','transac_pourc','required|numeric');
        $this->form_validation->set_rules('transac_taux','transac_taux','required|numeric');

		if($this->form_validation->run())     
        {   
            $current_datetime=date('Y-m-d H:i:s');

            $montant = $this->input->post('transac_montant');
            $pourcentage = $this->input->post('transac_pourc');

            $montant_caisse = ($montant * $pourcentage) / 100;
            

            $provenance=$this->input->post('provenance');
            $destination=$this->input->post('destination');

            $exped=$this->input->post('client_sid');
            $benef=$this->input->post('client_benef');

            if($provenance == $destination){
                $this->setError("L'agence de provenance ne peut pas etre la meme agence de destination. 
                    Veuillez indiquer une autre agence differente.");
            }else{
                if($exped == $benef){
                $this->setError("Le client Expediteur ne peut pas etre le meme client Beneficiaire.
                    Veuillez choisir un autre different.");
            }else{
            $params = array(
				'transac_monnaie' => $this->input->post('transac_monnaie'),
				'transac_type' => "Envoie",
				'provenance' => $provenance,
				'destination' => $destination,
				'client_sid' => $exped,
                'beneficiaire_sid' => $benef,
				'agent_sid' => $this->session->id,
				'transac_code' => $this->input->post('transac_code'),
				'transac_montant' =>  $montant,
				'transac_pourc' =>  $pourcentage,
				'transac_taux' => $this->input->post('transac_taux'),
				'date_created' => $current_datetime,
				'montant_caisse' => $montant_caisse,
                'transac_statut' => "encours"
            );
            //var_dump($params);
            //exit();
            $tb_am_transaction_id = $this->Transaction_model->add_tb_am_transaction($params);
            redirect('transaction/index');
        }}}
        else
        {
			$this->setError("Verifier la conformite de donnees du formulaire de creation de transaction.");
        }
    }  

    public function setError($error)
    {
        $this->load->model('Agence_model');
            $data['all_tb_am_agences'] = $this->Agence_model->get_all_tb_am_agences();
            $data['all_tb_am_agences'] = $this->Agence_model->get_all_tb_am_agences();

            $this->load->model('Client_model');
            $data['all_tb_am_clients'] = $this->Client_model->get_all_tb_am_clients();

            $this->load->model('User_model');
            $data['all_tb_am_users'] = $this->User_model->get_all_tb_am_users();
            
            $data['error'] = $error;
            $data['_view'] = 'transaction/add';
            $this->load->view('layouts/main',$data);
    }
    /*
     * Editing a tb_am_transaction
     */
    function edit($transac_id)
    {   
        // check if the tb_am_transaction exists before trying to edit it
        $data['tb_am_transaction'] = $this->Transaction_model->get_tb_am_transaction($transac_id);
        
        if(isset($data['tb_am_transaction']['transac_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('transac_code','Transac Code','required|max_length[10]');
			$this->form_validation->set_rules('destination','Destination','required');
			$this->form_validation->set_rules('client_sid','Client Sid','required');
			$this->form_validation->set_rules('provenance','Provenance','required');
		
			if($this->form_validation->run())     
            {   
                $current_datetime=date('Y-m-d H:i:s');

                $params = array(
					'transac_monnaie' => $this->input->post('transac_monnaie'),
					'transac_type' => "Retrait",
					'provenance' => $this->input->post('provenance'),
					'destination' => $this->input->post('destination'),
					'client_sid' => $this->input->post('client_sid'),
					'agent_sid' => $this->input->post('agent_sid'),
					'transac_code' => $this->input->post('transac_code'),
					'transac_montant' => $this->input->post('transac_montant'),
					'transac_pourc' => $this->input->post('transac_pourc'),
					'transac_taux' => $this->input->post('transac_taux'),
					'date_created' => $this->input->post('date_created'),
					'date_retrait' => $current_datetime,
					'montant_caisse' => $this->input->post('montant_caisse'),
                     'transac_statut' => "validee"
                );

                $this->Transaction_model->update_tb_am_transaction($transac_id,$params);            
                redirect('transaction/index');
            }
            else
            {
				$this->load->model('Agence_model');
				$data['all_tb_am_agences'] = $this->Agence_model->get_all_tb_am_agences();
				$data['all_tb_am_agences'] = $this->Agence_model->get_all_tb_am_agences();

				$this->load->model('Client_model');
				$data['all_tb_am_clients'] = $this->Client_model->get_all_tb_am_clients();

				$this->load->model('User_model');
				$data['all_tb_am_users'] = $this->User_model->get_all_tb_am_users();

                $data['_view'] = 'transaction/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tb_am_transaction you are trying to edit does not exist.');
    } 

    /*
     * Deleting tb_am_transaction
     */
    function remove($transac_id)
    {
        $tb_am_transaction = $this->Transaction_model->get_tb_am_transaction($transac_id);

        // check if the tb_am_transaction exists before trying to delete it
        if(isset($tb_am_transaction['transac_id']))
        {
            $this->Transaction_model->delete_tb_am_transaction($transac_id);
            redirect('transaction/index');
        }
        else
            show_error('The tb_am_transaction you are trying to delete does not exist.');
    }
       function view($transac_id)
    {   
        // check if the tb_am_transaction exists before trying to edit it
        $data['tb_am_transaction'] = $this->Transaction_model->get_tb_am_transaction($transac_id);
        
        if(isset($data['tb_am_transaction']['transac_id']))
        {
               $this->load->model('Agence_model');
                $data['all_tb_am_agences'] = $this->Agence_model->get_all_tb_am_agences();
                $data['all_tb_am_agences'] = $this->Agence_model->get_all_tb_am_agences();

                $this->load->model('Client_model');
                $data['all_tb_am_clients'] = $this->Client_model->get_all_tb_am_clients();

                $this->load->model('User_model');
                $data['all_tb_am_users'] = $this->User_model->get_all_tb_am_users();

                $data['_view'] = 'transaction/details';
                $this->load->view('layouts/main',$data);
            
        }
        else
            show_error('The tb_am_transaction you are trying to edit does not exist.');
    } 
}
