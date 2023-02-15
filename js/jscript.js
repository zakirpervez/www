$("a.delete-article").on("click", function (e) {
    e.preventDefault(); // prevent the item default item click.
    if (confirm("Are you sure")) {
        let frm = $("<form>");
        frm.attr('method', 'post');
        frm.attr('action', $(this).attr('href'));
        frm.appendTo("body");
        frm.submit();
    }
});