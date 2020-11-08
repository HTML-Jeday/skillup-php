<?php



class PostController {
    
      public function index()
    {
        $smarty = View::getInstance();

        $posts = PostModel::all();

        $now = date("H:i:s", time());

        $smarty->assign('posts', $posts);
        $smarty->assign('time', $now);
        $smarty->display('posts.tpl');
    }
    public function create() {
        
        $title = $_POST['title'];
        $text = $_POST['text'];
        
        $session = Session::init();
        $user = $session->get('user');
        
        $post = new PostModel();
        
        if(strlen($title) < 4 ){
            die('title is too short');
        }
         if(strlen($text) < 4){
            die('text is too short');
        }
        

        
        if(!$user['logged']){
            die('you are not logged in');
        }


        
        $post
            ->setTitle($title)
            ->setText($text)
            ->save(); 
        
        header("Location: /post");
   
        
    }
    
    public function delete() {
        
        global $parameter;
        
        $post = PostModel::find($parameter);
        
        $session = Session::init();
        $user = $session->get('user');
        
        
        if($post == null){
            die('Post not found');
        }
        

        
        if($user == null){
            die('You are  not logged in');
        }
        
        if($user['email'] !== $post->getAuthor()){
            die('Do not thouch this it is not yours');
        }
        
        $post->delete();
        
        
        header("Location: /post");
        
    }
    
    public function update(){
        
        global $parameter;
        
        $smarty = View::getInstance();    
        
        $session = Session::init();
        $user = $session->get('user');
        
        if($user == null){
            die('You are  not logged in');
        }
        
        $post = PostModel::find($parameter);
        
        if($user['email'] !== $post->getAuthor()){
            die('Do not thouch this it is not yours');
        }


        $smarty->assign('post', $post);
        $smarty->display('post.tpl');
    }
    
    public function edit(){
 

        $id = (int) $_POST['id'];
        $text = $_POST['text'];
        $title = $_POST['title'];
        
        $post = PostModel::find($id);
        
        $session = Session::init();
        $user = $session->get('user');
        

      
        if($text == null || $title == null){ 
            die('Nothing to update');
        }
        

        
        if($user == null){
            die('You are  not logged in');
        }
        
        if($user['email'] !== $post->getAuthor()){
            die('Do not thouch this it is not yours');
        }
        
        
        $post
            ->setText($text) 
            ->setTitle($title)
            ->save();
        
        
        
         header("Location: /post");
    }

}
