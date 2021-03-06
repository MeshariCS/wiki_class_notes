<?php 

require_once("Controller.php");

class UserController extends Controller implements ControllerInterface {
  
  //Constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }
  
  //Methods
  public function fresh(){
    $this->loadPage($user = null, "new_user");
  }
  //TODO: create authentication system
  public function login($data){
    $this->model = new UserAuth();
    $this->model->attemptLogin($data);
  }

  public function logout(){
    $this->model = new UserAuth();
    $this->model->logoutUser($_COOKIE['Auth']);
  }

  //Check if user is logged in and pass the user's data to the page
  private function checkAuth(){
    $this->model = new UserAuth();
    if( isset($_COOKIE['Auth']) ) {
      return $this->model->userForAuth($_COOKIE['Auth']);
    } else {
      return  false;
    }
  }

  public function create($params){
    $this->model = new User();
    $insert_id = $this->model->insert($params);
    $this->redirect("wiki_class_notes/user/all");
  }

  public function show($id){
    $this->model = new User();
    $user = $this->model->select($id);
    $this->loadPage($user = null, "show_user", $user);
  }

  public function all(){
    $this->model = new User();
    $all = $this->model->select();
    $this->loadPage($user = null, "all_users", $all);
  }

  public function edit($id){
    $this->model = new User();
    $user = $this->model->select($id);
    $this->loadPage($user = null, "edit_user", $user);
  }

  public function update($updates){
    $this->model = new User();
    $this->model->update($updates);
    $this->redirect("wiki_class_notes/user/show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new User();
    $this->model->delete($id);
    $this->redirect("wiki_class_notes/user/all");
  }

  
}