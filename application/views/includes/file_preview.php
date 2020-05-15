<iframe id="iframe-file-viewer" src="<?php echo $file_url ?>" style="width: 100%; margin: 0; border: 0; height: 100%;"></iframe>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#iframe-file-viewer").closest("div.app-modal-content-area").css({"height": "100%", display: "table", width: "100%"});
        });
    </script>

<script>
    function initScrollbarOnCommentContainer() {
        if ($("#file-preview-comment-container").height() > ($(window).height() - 300)) {
            initScrollbar('#file-preview-comment-container', {
                setHeight: $(window).height() - 300
            });
        }
    }
</script>