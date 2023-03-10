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

$.validator.addMethod("dateTime", function(value, element) {
    return (value === "") || ! isNaN(Date.parse(value));
}, "Must be a valid date and time");

$("#formArticle").validate({
    rules: {
        title: {
            required: true
        },
        content: {
            required: true
        },
        published_at: {
            dateTime: true
        }
    }
});

$("#contactForm").validate({
    rules: {
        email: {
            required: true
        },
        subject: {
            required: true
        },
        message: {
            required: true
        }
    }
});