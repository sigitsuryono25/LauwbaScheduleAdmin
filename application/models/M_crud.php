<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_crud
 *
 * @author sigit
 */
class M_crud extends CI_Model {

    //put your code here

    function select($table, $where, $orderby, $limit) {
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($orderby);
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    function insert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    function update($table, $where, $data) {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    function delete($table, $where) {
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }

    function join2table($table1, $table2, $key, $where, $limit) {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, "$table1.$key = $table2.$key");
        $this->db->where($where);
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

}
