<?php
    require_once("./model/Model.php");
    class Controller {
        
        function __construct() {
            $this->model = new Model();
            $currencies = $this->model->getCurrencies();
            
            if(isset($_POST['convert'])) {
                $currencyId = $_POST['currency'];
                $value = $_POST['value'];

                $currencyData = $this->model->getCurrencyById($currencyId);

                $answer = $value * $currencyData['value'];

                $data = [
                    'allCurrencies' => $currencies,
                    'answer' => $answer,
                    'value' => $value,
                    'name' => $currencyData['title']
                ];
            } else {
                $data = [
                    'allCurrencies' => $currencies,
                ];
            }

            $this->view('index', $data);
        }

        function view($view, $data = []) {
            require_once("./view/" . $view . ".php");
        }
    }