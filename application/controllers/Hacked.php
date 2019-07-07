<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Hacked
 *
 * @author sigit
 */
class Hacked extends CI_Controller {

    function index() {
        
    }

    function go_login() {
        $username = $this->input->post_get('username', TRUE);
        $pswd = $this->input->post_get('pswd', TRUE);

        $where = array("username" => $username, "password" => md5($pswd));
        $res = $this->crud->select("user", $where, null, null);
        if (sizeof($res) > 0) {
//            $data['data'] = array();
            $data['data'] = array("nama" => $res[0]->nama, "username" => $res[0]->username);
            $data['message'] = "data found";
            $data['status'] = "200";
        } else {
            $data['message'] = "data not found";
            $data['status'] = "404";
        }

        echo json_encode($data);
    }

    function go_get_evenlist() {
        $res = $this->crud->join2table("schedule", "user", "username", array(), null);
        if (sizeof($res) > 0) {
            $data['data'] = array();
            foreach ($res as $t) {
                $r = array();
                $r["id_schedule"] = $t->id_schedule;
                $r["username"] = $t->username;
                $r["start_date"] = $t->start_date;
                $r["end_date"] = $t->end_date;
                $r["event_name"] = $t->event_name;
                $r["nama"] = $t->nama;
                $r["color"] = $t->color;
                array_push($data['data'], $r);
            }

            $data['message'] = "data found";
            $data['status'] = "200";
        } else {
            $data['message'] = "data not found";
            $data['status'] = "404";
        }

        echo json_encode($data);
    }

    function go_get_profile() {
        $username = $this->input->post_get('username', TRUE);
        $where = array("username" => "sigitsuryono25");
        $res = $this->crud->select("user", $where, null, null);
        if (sizeof($res) > 0) {
//            $data['data'] = array();
            $data['data'] = array(
                "nama" => $res[0]->nama, 
                "color" => $res[0]->color, 
                "libur1" => $res[0]->libur1, 
                "libur2" => $res[0]->libur2, 
                "last_loggedin" => $res[0]->last_loggedin);
            $data['message'] = "data found";
            $data['status'] = "200";
        } else {
            $data['message'] = "data not found";
            $data['status'] = "404";
        }

        echo json_encode($data);
    }

    function go_put_event() {
        $usename = $this->input->post_get("username", TRUE);
        $start = $this->input->post_get("start_date", TRUE);
        $end = $this->input->post_get("end_date", TRUE);
        $event_name = $this->input->post_get("event_name", TRUE);
        $eventKind = $this->input->post_get("kind", TRUE);

        $insertData = array(
            "id_schedule" => uniqid(),
            "username" => $usename,
            "start_date" => $start,
            "end_date" => $end,
            "event_name" => $event_name,
            "kind" => $eventKind
        );

        $res = $this->crud->insert("schedule", $insertData);
        if ($res > 0) {
            $data['message'] = "data accepted";
            $data['status'] = "200";
        } else {
            $data['message'] = "accepted data failed";
            $data['status'] = "500";
        }

        echo json_encode($data);
    }

    function go_update_event() {
        $username = $this->input->post_get("username", TRUE);
        $uniqid = $this->input->post_get("uniqid", TRUE);
        $start = $this->input->post_get("start_date", TRUE);
        $end = $this->input->post_get("end_date", TRUE);
        $event_name = $this->input->post_get("event_name", TRUE);
        $eventKind = $this->input->post_get("kind", TRUE);

        $where = array("username" => $username, "id_schedule" => $uniqid);
        $updateData = array(
            "start_date" => $start,
            "end_date" => $end,
            "event_name" => $event_name,
            "kind" => $eventKind
        );

        $res = $this->crud->update("schedule", $updateData, $where);
        if ($res > 0) {
            $data['message'] = "update data successful";
            $data['status'] = "200";
        } else {
            $data['message'] = "update data failed";
            $data['status'] = "500";
        }

        echo json_encode($data);
    }

    function go_delete_data() {
        $uniqid = $this->input->post_get("uniqid", TRUE);
        $where = array("id_schedule" => $uniqid);
        $res = $this->crud->delete("schedule", $where);
        if ($res > 0) {
            $data['message'] = "update data successful";
            $data['status'] = "200";
        } else {
            $data['message'] = "update data failed";
            $data['status'] = "500";
        }

        echo json_encode($data);
    }

    function go_update_libur() {
        $username = $this->input->post_get("username", TRUE);
        $libur1 = $this->input->post_get("libur1", TRUE);
        $libur2 = $this->input->post_get("libur2", TRUE);
        $where = array("username" => $username);

        $updateData = array("libur1" => $libur1, "libur2" => $libur2);

        $res = $this->crud->update("schedule", $updateData, $where);
        if ($res > 0) {
            $data['message'] = "update data successful";
            $data['status'] = "200";
        } else {
            $data['message'] = "update data failed";
            $data['status'] = "500";
        }

        echo json_encode($data);
    }

}
