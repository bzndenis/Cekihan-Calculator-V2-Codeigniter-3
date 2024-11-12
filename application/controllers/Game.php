<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    public function index() {
        $data['title'] = 'Cekihan GASS';
        $this->load->view('templates/header', $data);
        $this->load->view('game/add_player');
        $this->load->view('templates/footer');
    }

    public function play() {
        $data['title'] = 'Main Game';
        $data['scores'] = $this->session->userdata('scores');
        
        $this->load->view('templates/header', $data);
        $this->load->view('game/play', $data);
        $this->load->view('templates/footer');
    }

    public function result() {
        $data['title'] = 'Hasil Game';
        $this->load->view('templates/header', $data);
        $this->load->view('game/result');
        $this->load->view('templates/footer');
    }

    public function reset_scores() {
        // Reset scores ketika game berakhir
        $players = $this->session->userdata('players');
        if ($players) {
            $scores = array_fill_keys($players, 0);
            $this->session->set_userdata('scores', $scores);
        }
        redirect(base_url('game/'));
    }

    public function add_player() {
        $player_name = $this->input->post('player_name');
        $players = $this->session->userdata('players') ?: [];
        $scores = $this->session->userdata('scores') ?: [];
        
        if (!empty(trim($player_name))) {
            $players[] = $player_name;
            $scores[$player_name] = 0;
            
            $this->session->set_userdata('players', $players);
            $this->session->set_userdata('scores', $scores);
            
            redirect(base_url());
        }
        
        echo json_encode(['success' => true]);
    }

    public function add_score() {
        $player = $this->input->post('player');
        $points = (int)$this->input->post('points');
        
        $scores = $this->session->userdata('scores');
        if (!is_array($scores[$player])) {
            // Inisialisasi array untuk menyimpan total score dan last_points
            $scores[$player] = [
                'total' => 0,
                'last_points' => 0
            ];
        }
        
        $scores[$player]['total'] += $points;
        $scores[$player]['last_points'] = $points;
        
        $this->session->set_userdata('scores', $scores);
        redirect('game/play');
    }

    public function get_winner() {
        $scores = $this->session->userdata('scores');
        $losers = [];
        $min_score = min($scores);
        
        foreach ($scores as $player => $score) {
            if ($score > $min_score) {
                $losers[] = $player;
            } else {
                $winner = $player;
            }
        }
        
        echo json_encode([
            'winner' => $winner,
            'losers' => $losers
        ]);
    }

    public function delete_player($index) {
        $players = $this->session->userdata('players');
        $scores = $this->session->userdata('scores');
        
        if (isset($players[$index])) {
            $player_name = $players[$index];
            unset($players[$index]);
            unset($scores[$player_name]);
            
            // Reindex array setelah menghapus
            $players = array_values($players);
            
            $this->session->set_userdata('players', $players);
            $this->session->set_userdata('scores', $scores);
        }
        
        redirect(base_url());
    }
}