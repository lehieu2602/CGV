function like(movie_id, userId) {
    //your validation code
    $.ajax({
        type: 'POST',
        url: 'add_like.php', //file where like unlike status change in database
        data: { movie_id: movie_id, user_id: userId },
        success: function (data) {
            console.log(data);
            // alert("Đã thích!");
            location.reload();
        }
    });
}

function unlike(movie_id, userId) {
    //your validation code
    $.ajax({
        type: 'POST',
        url: 'delete_like.php', //file where like unlike status change in database
        data: { movie_id: movie_id, user_id: userId },
        success: function (data) {
            console.log(data);
            // alert("Đã xóa thích!");
            location.reload();
        }
    });
}