<?php

class Functions
{
    public function toast($side)
    {
        if (isset($_SESSION['toast'])) {
            if (!isset($_SESSION['toast']['duration'])) {
                $_SESSION['toast']['duration'] = 3; //In seconds...
            }

            if (isset($_SESSION['toast']['type'])) {
                $type = $_SESSION['toast']['type'];
            } else {
                $type = "";
            }

            if ($_SESSION['toast']['msg'] != "") {
                if ($side == 1) {
                    if ($type == 'alert') {
                        $toastMsg = "<script>ak_alertify('" . $_SESSION['toast']['msg'] . "');</script>";
                    } elseif ($type == 'success') {
                        $toastMsg = "<script>alertify.success('" . $_SESSION['toast']['msg'] . "'," . $_SESSION['toast']['duration'] . ");</script>";
                    } elseif ($type == 'error') {
                        $toastMsg = "<script>alertify.error('" . $_SESSION['toast']['msg'] . "'," . $_SESSION['toast']['duration'] . ");</script>";
                    } elseif ($type == 'warning') {
                        $toastMsg = "<script>alertify.warning('" . $_SESSION['toast']['msg'] . "'," . $_SESSION['toast']['duration'] . ");</script>";
                    } else {
                        $toastMsg = "<script>alertify.message('" . $_SESSION['toast']['msg'] . "'," . $_SESSION['toast']['duration'] . ");</script>";
                    }
                } else {
                    $toastMsg = "<script> Materialize.toast('" . $_SESSION['toast']['msg'] . "', 5000);</script>";
                }

                $_SESSION['toast']['msg'] = "";
                unset($_SESSION['toast']['type']);
                unset($_SESSION['toast']['duration']);
                return $toastMsg;
            }
        }
    }
}
