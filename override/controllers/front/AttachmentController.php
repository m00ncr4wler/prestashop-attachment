<?php

class AttachmentController extends AttachmentControllerCore
{
    public function postProcess()
    {
        $a = new Attachment(Tools::getValue('id_attachment'), $this->context->language->id);
        if (!$a->id)
            Tools::redirect('index.php');

        Hook::exec('actionDownloadAttachment', array('attachment' => &$a));

        if (ob_get_level() && ob_get_length() > 0)
            ob_end_clean();

        $inlineAttachment = array(
            'application/pdf',
        );
        $disposition = 'attachment';

        if (in_array($a->mime, $inlineAttachment)) {
            $disposition = 'inline';
        }

        header('Content-Transfer-Encoding: binary');
        header('Content-Type: ' . $a->mime);
        header('Content-Length: ' . filesize(_PS_DOWNLOAD_DIR_ . $a->file));
        header('Content-Disposition: ' . $disposition . '; filename="' . utf8_decode($a->file_name) . '"');
        @set_time_limit(0);
        readfile(_PS_DOWNLOAD_DIR_ . $a->file);
        exit;
    }
}