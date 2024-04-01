<?php 

function userIndex() {
    $view = 'user';

    require_once PATH_VIEW_MASTER;
}

function ajaxUserList() {
    try {
        $data = listAll('users');

        echo json_encode($data);
    } catch (Throwable $th) {
        http_response_code(500);
    }
}

function ajaxUserCreate($data) {
    try {
        $data['password'] = md5($data['password']);
        
        $id = insert_get_last_id('users', $data);

        $data = showOne('users', $id);

        echo json_encode($data);
    } catch (Throwable $th) {
        http_response_code(500);
    }
}

function ajaxUserShow($id) {
    try {        
        $data = showOne('users', $id);

        echo json_encode($data);
    } catch (Throwable $th) {
        http_response_code(500);
    }
}

function ajaxUserUpdate($id, $data) {
    try {
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = md5($data['password']);
        }

        update('users', $id, $data);
        
        $data = showOne('users', $id);

        echo json_encode($data);
    } catch (Throwable $th) {
        http_response_code(500);
    }
}

function ajaxUserDelete($id) {
    try {
        delete2('users', $id);
        
        echo true;
    } catch (Throwable $th) {
        http_response_code(500);
    }
}

