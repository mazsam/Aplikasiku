<?php
    require APPPATH . '/libraries/REST_Controller.php';

    class DataPelanggan extends REST_Controller {

        function __construct($config = 'rest') {
            parent::__construct($config);
            $this->load->model('ModelDataPelanggan');
        }

        public function index_get()
        {
            // Users from a data store e.g. database
            // $userss = [
            //     ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
            //     // ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com', 'fact' => 'Developed on CodeIgniter'],
            //     // ['id' => 3, 'name' => 'Jane', 'email' => 'jane@example.com', 'fact' => 'Lives in the USA', ['hobbies' => ['guitar', 'cycling']]],
            // ];
    
            $id = $this->get('id');

            $users = $this->ModelDataPelanggan->getuser($id);
            
            // var_dump($users->result_array());
            // var_dump($userss);
            // If the id parameter doesn't exist return all the users
    
            if ($id === NULL)
            {
                // Check if the users data store contains users (in case the database result returns NULL)
                if ($users->result_array())
                {
                    // Set the response and exit
                    $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                }else
                {
                    // Set the response and exit
                    $this->response([
                        'status' => FALSE,
                        'message' => 'No users were found'
                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
                }
            }
    
            // Find and return a single record for a particular user.
    
            $id = (string) $id;
    
            // Validate the id.
            if ($id <= 0)
            {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }
    
            // Get the user from the array, using the id as key for retrieval.
            // Usually a model is to be used for this.
    
            $user = NULL;
    
            if (!empty($users))
            {
                foreach ($users->result() as $value)
                {
                    if (isset($value->code) && $value->code === $id)
                    {
                        $user = $value;
                    }
                }
            }
    
            if (!empty($user))
            {
                $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'User could not be found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }
?>