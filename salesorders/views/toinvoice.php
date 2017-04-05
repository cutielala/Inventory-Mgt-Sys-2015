<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
 <p>some content</p>
        <input type="hidden" name="bookId" id="bookId" value=""/>
        <script>
            $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
});

            </script>
