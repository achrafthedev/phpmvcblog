<?php
class Posts extends Controller
{
    private $postModel;

    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $posts = $this->postModel->findAllPosts();
        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }

    public function dashboard()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $posts = $this->postModel->findPostsByUserId($_SESSION['user_id']);
        $data = [
            'posts' => $posts
        ];
        $this->view('posts/dashboard', $data);
    }

    public function show($id)
    {
        $post = $this->postModel->findPostById($id);
        if (!$post) {
            die('Post not found.');
        }
        $data = [
            'post' => $post
        ];
        $this->view('posts/show', $data);
    }

    public function create()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $data = [
            'title' => '',
            'body' => '',
            'titleError' => '',
            'bodyError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title'] ?? ''),
                'body' => trim($_POST['body'] ?? ''),
                'titleError' => '',
                'bodyError' => ''
            ];

            if (empty($data['title'])) {
                $data['titleError'] = 'Title must not be empty.';
            }

            if (empty($data['body'])) {
                $data['bodyError'] = 'Body must not be empty.';
            }

            if (empty($data['titleError']) && empty($data['bodyError'])) {
                if ($this->postModel->addPost($data)) {
                    $_SESSION['create_msg'] = 'Post created successfully!';
                    redirect('posts/dashboard');
                } else {
                    die('Something went wrong, please try again.');
                }
            }
        }

        $this->view('posts/create', $data);
    }

    public function update($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $post = $this->postModel->findPostById($id);

        if (!$post) {
            die('Post not found.');
        }

        if ($post->user_id != $_SESSION['user_id']) {
            redirect('posts');
        }

        $data = [
            'post' => $post,
            'title' => $post->title,
            'body' => $post->body,
            'titleError' => '',
            'bodyError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'post' => $post,
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title'] ?? ''),
                'body' => trim($_POST['body'] ?? ''),
                'titleError' => '',
                'bodyError' => ''
            ];

            if (empty($data['title'])) {
                $data['titleError'] = 'The title of a post cannot be empty.';
            }

            if (empty($data['body'])) {
                $data['bodyError'] = 'The body of a post cannot be empty.';
            }

            if (empty($data['titleError']) && empty($data['bodyError'])) {
                if ($this->postModel->updatePost($data)) {
                    $_SESSION['update_msg'] = 'Post updated successfully!';
                    redirect('posts/dashboard');
                } else {
                    die('Something went wrong, please try again.');
                }
            }
        }

        $this->view('posts/update', $data);
    }

    public function delete($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $post = $this->postModel->findPostById($id);

        if (!$post) {
            die('Post not found.');
        }

        if ($post->user_id != $_SESSION['user_id']) {
            redirect('posts');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deletePost($id)) {
                $_SESSION['delete_msg'] = 'Post deleted successfully.';
                redirect('posts/dashboard');
            } else {
                die('Something went wrong.');
            }
        } else {
            redirect('posts/dashboard');
        }
    }
}
