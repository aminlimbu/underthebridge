<?php
// Home page controller
class Home extends Controller{
    // Construct method
    public function __construct(){

    }
    // Additional methods
    public function index(){
        // properties
        $data = [
            'title' => 'Welcome to <span style="font-family: \'Righteous\', cursive;">Under</span> <span class="bg-secondary rounded p-2">The Bridge</span>',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex modi atque repudiandae beatae. Quas cupiditate aliquid corrupti eum officia consectetur voluptas cum perspiciatis, porro quaerat soluta esse placeat maxime quisquam.',
            'quotes' => $this->getQuotes()
        ];
        // view
        $this->view('Home/index', $data);
    }

    public function getQuotes(){
        $url = 'https://api.api-ninjas.com/v1/quotes?category=happiness';

        // Initialise new CURL session
        $curl = curl_init($url);
        // Setup cURL options
        curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-Api-Key : " . NINJAPI, 
            "Content-Type : application/json"
        ],
        ]);

        // execute cURL and store values to response
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        // Error handling; decode json data; return quote
        if($err){
            echo "cURL Error: " .$err;
        }else{
            $quote = json_decode($response, true);
            return $quote[0]['quote'];
        }
        curl_close($curl);
    }
}
?>