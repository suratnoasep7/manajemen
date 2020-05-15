<style type="text/css">
    .document_status {
        width: 100%;
    }
    .document_type {
        width: 100%;
    }
    .input-group {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -ms-flex-align: stretch;
        align-items: stretch;
        width: 100%;
    }
    .input-group-prepend {
        margin-right: -1px;
    }
    .input-group-append, .input-group-prepend {
        display: -ms-flexbox;
        display: flex;
    }
    .input-group>.input-group-append:last-child>.btn:not(:last-child):not(.dropdown-toggle), .input-group>.input-group-append:last-child>.input-group-text:not(:last-child), .input-group>.input-group-append:not(:last-child)>.btn, .input-group>.input-group-append:not(:last-child)>.input-group-text, .input-group>.input-group-prepend>.btn, .input-group>.input-group-prepend>.input-group-text {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.input-group-text {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    padding: .375rem .75rem;
    margin-bottom: 0;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    text-align: center;
    white-space: nowrap;
    background-color: #e9ecef;
    border: 1px solid #ced4da;
    border-radius: .25rem;
}
.input-group>.custom-file {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
}
.input-group>.custom-file, .input-group>.custom-select, .input-group>.form-control, .input-group>.form-control-plaintext {
    position: relative;
    -ms-flex: 1 1 0%;
    flex: 1 1 0%;
    min-width: 0;
    margin-bottom: 0;
}
.custom-file {
    position: relative;
    display: inline-block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    margin-bottom: 0;
}

.custom-file-input {
    position: relative;
    z-index: 2;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    margin: 0;
    opacity: 0;
}
button, input {
    overflow: visible;
}
button, input, optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
.input-group>.custom-file:not(:first-child) .custom-file-label {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.custom-control-label::before, .custom-file-label, .custom-select {
    transition: background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.custom-file-label {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: .25rem;
}
label {
    display: inline-block;
    margin-bottom: .5rem;
}
.custom-file-label::after {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 3;
    display: block;
    height: calc(1.5em + .75rem);
    padding: .375rem .75rem;
    line-height: 1.5;
    color: #495057;
    content: "Browse";
    background-color: #e9ecef;
    border-left: inherit;
    border-radius: 0 .25rem .25rem 0;
}
</style>
<?php echo form_open_multipart(get_uri("projects/save_file"), array("id" => "file-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="project_id" value="<?php echo $project_id; ?>" />
    <div class="form-group">
        <label for="document_no" class="">Document No</label>
        <div>
            <input type="text" name="document_no" value="" id="document_no" class="form-control" placeholder="Document No" autofocus="1" data-rule-required="1" data-msg-required="This field is required." aria-required="true" autocomplete="off">
        </div>
    </div>
    <div class="form-group">
        <label for="document_title" class="">Document Title</label>
        <div>
            <input type="text" name="document_title" value="" id="document_title" class="form-control" placeholder="Document Title" autofocus="1" data-rule-required="1" data-msg-required="This field is required." aria-required="true" autocomplete="off">
        </div>
    </div>
    <div class="form-group">
        <label for="revision" class="">Revision</label>
        <div>
            <input type="text" name="revision" value="" id="revision" class="form-control" placeholder="Revision" autofocus="1" data-rule-required="1" data-msg-required="This field is required." aria-required="true" autocomplete="off">
        </div>
    </div>
    <div class="form-group">
        <label for="document_type" class="">Document Type</label>
        <div>
            <select class="document_type select2 form-control" name="document_type">
                <option value="CAL">Calculation</option>
                <option value="DSR">Design Report</option>
                <option value="DTS">Datasheet</option>
                <option value="ICD">Interface Control Document</option>
                <option value="ICP">Inception Report</option>
                <option value="MAN">Manual</option>
                <option value="MSA">Material Samples Approval</option>
                <option value="OMM">Operation & Maintenance Manual</option>
                <option value="OTR">Other Reports</option>
                <option value="OVW">Overview</option>
                <option value="PLN">Plan</option>
                <option value="PMC">Project Manajemen Control</option>
                <option value="PRO">Procedure</option>
                <option value="SAS">Sub Conctractor Approval Submittal</option>
                <option value="SOP">Standart Operating Procedure</option>
                <option value="TRP">Test Report</option>
                <option value="TSP">Technical Specification</option>
                <option value="WPR">Weekly Progress Report</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="document_status">Document Status</label>
        <div>
            <select class="document_status select2 form-control" name="document_status">
                <option value="1">Issued For Approval</option>
                <option value="2">Issued For Information</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="disicpline">Disicpline</label>
        <div>
            <select class="disicpline select2 form-control" name="disicpline">
                <option value="000">General</option>
                <option value="010">Structures</option>
                <option value="020">Building Strucurtes</option>
                <option value="030">Building Architecture</option>
                <option value="040">Surveys</option>
                <option value="060">Building Management System</option>
                <option value="140">Track & Formation</option>
                <option value="310">Telecommunication (Fiber Optic Transmission System)</option>
                <option value="313">Telecom (Radio System)</option>
                <option value="314">Telecom (Cctv)</option>
                <option value="318">Telecom (VoIP)</option>
                <option value="440">SCADA</option>
                <option value="610">Depot Layout</option>
                <option value="P20">Project Control</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="zone">Zone</label>
        <div>
            <select class="zone select2 form-control" name="zone">
                <option value="1">Depot</option>
                <option value="2">Depot Station</option>
                <option value="3">Pulomas Station</option>
                <option value="4">Veledrom Station</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="revision_date">Revision Date</label>
        <div>
            <input type="text" name="revision_date" class="form-control" placeholder="Revision Date" id="revision_date" autocomplete="off">
        </div>
    </div>
    <div class="form-group">
        <label for="creation_date">Creation Date</label>
        <div>
            <input type="text" name="creation_date" class="form-control" placeholder="Revision Date" id="creation_date" autocomplete="off">
        </div>
    </div>
    <div class="form-group">
        <label for="file">File</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
          </div>
          <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="inputGroupFile01"
              aria-describedby="inputGroupFileAddon01" accept=".docx,.doc,.zip,.pdf,.rar">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default cancel-upload" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary start-upload"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function () {

        $('.document_status').select2();
        $('.document_type').select2();
        $('.disicpline').select2();
        $('.zone').select2();

        setDatePicker("#revision_date, #creation_date");


    });



</script>    
