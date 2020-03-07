<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MReports extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_inventory_summary()
    {
        $data = array();
        $tmp_date = array();
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        if ($this->input->post('item_id') != 'all')
        {
            $items = array($this->MItems->get_by_id($this->input->post('item_id' )));
        }
        else
        {
            $items = $this->MItems->get_all();
        }
        //var_dump( $items );

        // Get All Purchase Date
        $this->db->where('purchase_date BETWEEN "' . date_to_db($start_date) . '" AND "' . date_to_db($end_date) . '"');
        $this->db->where('company_id', $this->session->userdata('user_company'));
        $this->db->group_by('purchase_date');
        $q = $this->db->get('purchase_master');
        if ($q->num_rows() > 0)
        {
            foreach ($q->result_array() as $row)
            {
                $inv_date['inv_date'] = $row['purchase_date'];
                $tmp_date[] = $inv_date;
            }
        }

        // Get All Purchase Return Date
        $this->db->where('purchase_return_date BETWEEN "' . date_to_db($start_date) . '" AND "' . date_to_db($end_date) . '"');
        $this->db->where('company_id', $this->session->userdata('user_company'));
        $this->db->group_by('purchase_return_date');
        $q = $this->db->get('purchase_return_master');
        if ($q->num_rows() > 0)
        {
            foreach ($q->result_array() as $row)
            {
                $inv_date['inv_date'] = $row['purchase_return_date'];
                $tmp_date[] = $inv_date;
            }
        }

        // Get All Sales Date
        $this->db->where('sales_date BETWEEN "' . date_to_db($start_date) . '" AND "' . date_to_db($end_date) . '"');
        $this->db->where('company_id', $this->session->userdata('user_company'));
        $this->db->group_by('sales_date');
        $q = $this->db->get('sales_master');
        if ($q->num_rows() > 0)
        {
            foreach ($q->result_array() as $row)
            {
                $inv_date['inv_date'] = $row['sales_date'];
                $tmp_date[] = $inv_date;
            }
        }

        // Get All Sales Return Date
        $this->db->where('sales_return_date BETWEEN "' . date_to_db($start_date) . '" AND "' . date_to_db($end_date) . '"');
        $this->db->where('company_id', $this->session->userdata('user_company'));
        $this->db->group_by('sales_return_date');
        $q = $this->db->get('sales_return_master');
        if ($q->num_rows() > 0)
        {
            foreach ($q->result_array() as $row)
            {
                $inv_date['inv_date'] = $row['sales_return_date'];
                $tmp_date[] = $inv_date;
            }
        }

        // Previous Purchase
        $prev_purchases = $this->MPurchase_master->get_before_date($start_date);
        // Previous Purchase Return
        $prev_purchase_returns = $this->MPurchase_return_master->get_before_date($start_date);
        // Previous Sales
        $prev_sales = $this->MSales_master->get_before_date($start_date);
        // Previous Sales Return
        $prev_sales_returns = $this->MSales_return_master->get_before_date($start_date);

        foreach ($items as $item)
        {
            $ins = 0;
            // Purchase Quantity
            foreach ($prev_purchases as $prev_purchase)
            {
                $purchase_details = $this->MPurchase_details->get_by_purchase_no_item_id($prev_purchase['purchase_no'], $item['id']);
                $ins += $purchase_details['quantity'];
            }
            // Purchase Return Quantity
            foreach ($prev_purchase_returns as $prev_purchase_return)
            {
                $purchase_return_details = $this->MPurchase_return_details->get_by_purchase_return_no_item_id($prev_purchase_return['purchase_return_no'], $item['id']);
                $ins -= $purchase_return_details['quantity'];
            }

            $outs = 0;
            // Sales Quantity
            foreach ($prev_sales as $prev_sale)
            {
                $sales_details = $this->MSales_details->get_by_sales_no_item_id($prev_sale['sales_no'], $item['id']);
                $outs += $sales_details['quantity'];
            }
            // Sales Return Quantity
            foreach ($prev_sales_returns as $prev_sales_return)
            {
                $sales_return_details = $this->MSales_return_details->get_by_sales_return_no_item_id($prev_sales_return['sales_return_no'], $item['id']);
                $outs -= $sales_return_details['quantity'];
            }

            $tmp_open['name'] = $item['name'];
            $tmp_open['open'] = $ins - $outs;
            $open[] = $tmp_open;
            unset($tmp_open);
            //$open[$item['name']] = $ins - $outs;
        }
        //var_dump($just_open);
        $inv = array();
        if (count($tmp_date) > 0)
        {
            $sort_date = array_sort($tmp_date, 'inv_date');
            $distinct_date = array_distinct($sort_date, 'inv_date');

            foreach ($distinct_date as $date)
            {
                // Get Purchase by date
                $purchases = $this->MPurchase_master->get_by_date($date['inv_date']);
                // Get Purchase Return by date
                $purchase_returns = $this->MPurchase_return_master->get_by_date($date['inv_date']);
                // Get Sales by date
                $sales = $this->MSales_master->get_by_date($date['inv_date']);
                // Get Sales Return by date
                $sales_returns = $this->MSales_return_master->get_by_date($date['inv_date']);
                $tmp_item = array();
                foreach ($items as $item)
                {
                    $purchase_qty = 0;
                    if (count($purchases) > 0)
                    {
                        foreach ($purchases as $purchase)
                        {
                            $tmp_purchase = $this->MPurchase_details->get_by_purchase_no_item_id($purchase['purchase_no'], $item['id']);
                            if ($tmp_purchase)
                            {
                                $purchase_qty += $tmp_purchase['quantity'];
                            }
                        }
                    }
                    $purchase_return_qty = 0;
                    if (count($purchase_returns) > 0)
                    {
                        foreach ($purchase_returns as $purchase_return)
                        {
                            $tmp_purchase_return = $this->MPurchase_return_details->get_by_purchase_return_no_item_id($purchase_return['purchase_return_no'], $item['id']);
                            if ($tmp_purchase_return)
                            {
                                $purchase_return_qty += $tmp_purchase_return['quantity'];
                            }
                        }
                    }
                    $sales_qty = 0;
                    if (count($sales) > 0)
                    {
                        foreach ($sales as $sale)
                        {
                            $tmp_sales = $this->MSales_details->get_by_sales_no_item_id($sale['sales_no'], $item['id']);
                            if ($tmp_sales)
                            {
                                $sales_qty += $tmp_sales['quantity'];
                            }
                        }
                    }
                    $sales_return_qty = 0;
                    if (count($sales_returns) > 0)
                    {
                        foreach ($sales_returns as $sales_return)
                        {
                            $tmp_sales_return = $this->MSales_return_details->get_by_sales_return_no_item_id($sales_return['sales_return_no'], $item['id']);
                            if ($tmp_sales_return)
                            {
                                $sales_return_qty += $tmp_sales_return['quantity'];
                            }
                        }
                    }
                    $tmp['item_id'] = $item['id'];
                    $tmp['item_name'] = $item['name'];
                    $tmp['purchase_qty'] = $purchase_qty;
                    $tmp['purchase_return_qty'] = $purchase_return_qty;
                    $tmp['sales_qty'] = $sales_qty;
                    $tmp['sales_return_qty'] = $sales_return_qty;
                    $tmp_item[] = $tmp;
                }
                $tmp_data['date'] = $date['inv_date'];
                $tmp_data['details'] = $tmp_item;
                $inv[] = $tmp_data;
            }
        }
        $data['open'] = isset($open) ? $open : 0;
        $data['inv'] = $inv;
        return $data;
    }

    public function get_stock_balance($item_id)
    {
        $this->db->select_sum('quantity');
        $this->db->where('item_id', $item_id);
        $puchase_q = $this->db->get('purchase_details');
        if ($puchase_q->num_rows() > 0)
        {
            foreach ($puchase_q->result_array() as $row)
            {
                $purchase = $row;
            }
        }

        $puchase_q->free_result();

        $this->db->select_sum('quantity');
        $this->db->where('item_id', $item_id);
        $sales_q = $this->db->get('sales_details');
        if ($sales_q->num_rows() > 0)
        {
            foreach ($sales_q->result_array() as $row)
            {
                $sales = $row;
            }
        }

        $sales_q->free_result();

        return (int)$purchase['quantity'] - (int)$sales['quantity'];

    }

}
