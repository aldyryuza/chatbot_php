$(document).ready(function () {
    $("#send-btn").on("click", function () {
        $value = $("#data").val();
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
        $(".form").append($msg);
        $("#data").val('');

        // start ajax code
        $.ajax({
            url: 'bot.php',
            type: 'POST',
            data: 'text=' + $value,
            success: function (result) {
                $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                $(".form").append($replay);
                // scroll bar akan otomatis kebawah mengikuti chat
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });
    });
});

const textbox = document.getElementById("data");
textbox.addEventListener("keypress", function onEvent(event) {
    if (event.key === "Enter") {
        document.getElementById("send-btn").click();
    }
});