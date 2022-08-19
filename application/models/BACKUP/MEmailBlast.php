<?php

    Class MEmailBlast Extends CI_Model
    {
        function get_pi_signed($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_pi_submitPI signed_flag, a.sign_pi_submit_at signed_at, b.AccountName signed_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_pi_submit_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_po($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_pi_po po_flag, a.sign_pi_po_at po_at, b.AccountName po_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_pi_po_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_shipping_term($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_shipping_term ship_term_flag, a.sign_shipping_term_at ship_term_at, b.AccountName ship_term_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_shipping_term_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_ket_exp_doc($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_expprint_trial ket_doc_flag, a.sign_expprint_trial_at ket_doc_at, b.AccountName ket_doc_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_expprint_trial_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_ket_exp_doc_apprv($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_expprint_apprv ket_doc_apprv_flag, a.sign_expprint_apprv_at ket_doc_apprv_at, b.AccountName ket_doc_apprv_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_expprint_apprv_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_posm($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_posm posm_flag, a.sign_posm_at posm_at, b.AccountName posm_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_posm_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_finish_good($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_finishgod finish_flag, a.sign_finishgod_at finish_at, b.AccountName finish_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_finishgod_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_packing($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_packing_list packing_flag, a.sign_packing_list_at packing_at, b.AccountName packing_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_packing_list_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_stuffing($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_stuffing stuffing_flag, a.sign_stuffing_at stuffing_at, b.AccountName stuffing_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_stuffing_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_coo($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_coo coo_flag, a.sign_coo_at coo_at, b.AccountName coo_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_coo_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_health($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_healthcert healthcert_flag, a.sign_healthcert_at healthcert_at, b.AccountName healthcert_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_healthcert_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_material($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_materialsafe materialsafe_flag, a.sign_materialsafe_at materialsafe_at, b.AccountName materialsafe_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_materialsafe_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_coa($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_coa coa_flag, a.sign_coa_at coa_at, b.AccountName coa_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_coa_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_prod_spec($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_product_specificat prod_spec_flag, a.sign_product_specificat_at prod_spec_at, b.AccountName prod_spec_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_product_specificat_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_spp($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_spp spp_flag, a.sign_spp_at spp_at, b.AccountName spp_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_spp_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_billing($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_bill_of_ladding billing_flag, a.sign_bill_of_ladding_at billing_at, b.AccountName billing_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_bill_of_ladding_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_others($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_others others_flag, a.sign_others_at others_at, b.AccountName others_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_others_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_vessel_schedule($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_vesselsche vessel_schedule_flag, a.sign_vesselsche_at vessel_schedule_at, b.AccountName vessel_schedule_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_vesselsche_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_vessel_booking($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_vesselbookconf vessel_book_flag, a.sign_vesselbookconf_at vessel_book_at, b.AccountName vessel_book_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_vesselbookconf_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_draft_sent($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_draftbl_sent draft_sent_flag, a.sign_draftbl_sent_at draft_sent_at, b.AccountName draft_sent_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_draftbl_sent_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_draft_apprv($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_draftbl_apprv draft_apprv_flag, a.sign_draftbl_apprv_at draft_apprv_at, b.AccountName draft_apprv_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_draftbl_apprv_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_telex($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_telex_release telex_flag, a.sign_telex_release_at telex_at, b.AccountName telex_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_telex_release_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_ori_doc($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_origin_docsent ori_doc_flag, a.sign_origin_docsent_at ori_doc_at, b.AccountName ori_doc_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_origin_docsent_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_etd($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_etd etd_flag, a.sign_etd_at etd_at, b.AccountName etd_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_etd_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_eta($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_eta eta_flag, a.sign_eta_at eta_at, b.AccountName eta_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_eta_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_top($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_pi_top top_flag, a.sign_pi_top_at top_at, b.AccountName top_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_pi_top_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_dp($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_dp_receipt dp_flag, a.sign_dp_receipt_at dp_at, b.AccountName dp_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_dp_receipt_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_dp_confirm($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_dp_receipt_conf dp_confirm_flag, a.sign_dp_receipt_conf_at dp_confirm_at, b.AccountName dp_confirm_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_dp_receipt_conf_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_invoice($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_invoice invoice_flag, a.sign_invoice_at invoice_at, b.AccountName invoice_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_invoice_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_invoice_uv($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_invoice_underval invoice_uv_flag, a.sign_invoice_underval_at invoice_uv_at, b.AccountName invoice_uv_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_invoice_underval_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_foc($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_foc foc_flag, a.sign_foc_at foc_at, b.AccountName foc_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_foc_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_balance($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_balancepay balance_flag, a.sign_balancepay_at balance_at, b.AccountName balance_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_balancepay_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }

        function get_pi_top_payment($id)
        {
            $qry="SELECT
                    a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
                    a.sign_toppay_balance top_balance_flag, a.sign_toppay_balance top_balance_at, b.AccountName top_balance_by,
                    ROUND(((
                    IFNULL(a.sign_pi_submitPI, 0) +
                    IFNULL(a.sign_pi_po, 0) +
                    IFNULL(a.sign_pi_top, 0) +
                    IFNULL(a.sign_dp_receipt, 0) +
                    IFNULL(a.sign_dp_receipt_conf, 0) +
                    IFNULL(a.sign_shipping_term, 0) +
                    IFNULL(a.sign_bill_of_ladding, 0) +
                    IFNULL(a.sign_packing_list, 0) +
                    IFNULL(a.sign_invoice, 0) +
                    IFNULL(a.sign_invoice_underval, 0) +
                    IFNULL(a.sign_coo, 0) +
                    IFNULL(a.sign_healthcert, 0) +
                    IFNULL(a.sign_materialsafe, 0) +
                    IFNULL(a.sign_coa, 0) +
                    IFNULL(a.sign_product_specificat, 0) +
                    IFNULL(a.sign_spp, 0) +
                    IFNULL(a.sign_others, 0) +
                    IFNULL(a.sign_expprint_trial, 0) +
                    IFNULL(a.sign_expprint_apprv, 0) +
                    IFNULL(a.sign_foc, 0) +
                    IFNULL(a.sign_posm, 0) +
                    IFNULL(a.sign_finishgod, 0) +
                    IFNULL(a.sign_vesselsche, 0) +
                    IFNULL(a.sign_balancepay, 0) +
                    IFNULL(a.sign_vesselbookconf, 0) +
                    IFNULL(a.sign_stuffing, 0) +
                    IFNULL(a.sign_draftbl_sent, 0) +
                    IFNULL(a.sign_draftbl_apprv, 0) +
                    IFNULL(a.sign_telex_release, 0) +
                    IFNULL(a.sign_origin_docsent, 0) +
                    IFNULL(a.sign_toppay_balance, 0) +
                    IFNULL(a.sign_etd, 0) +
                    IFNULL(a.sign_eta, 0)
                    )/33)*100, 2
                ) total
                FROM gexp_sign_pi a
                LEFT JOIN gexp_users b ON a.sign_toppay_balance_by = b.UsersId
                WHERE a.sign_pi_noid = '".$id."' ";
            $res = $this->db->query($qry);
            return $res->row();
        }
    }

?>