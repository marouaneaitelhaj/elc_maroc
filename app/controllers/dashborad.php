<?php
class dashborad extends controller
{
    public function __construct()
    {
        $this->model('Database');
        $dashborad = $this->model('crud');
        $this->view('dashborad', ['read' => $dashborad->admnlimitread()]);
    }
}
