

    var borrowButtons = document.querySelectorAll('.borrowbtn');


    borrowButtons.forEach(function (button) {
        button.addEventListener('click', function () {

            button.style.display = 'none';
            bookAddedMessage = button.parentElement.querySelector('.BookAdded');
            if (bookAddedMessage) {
            bookAddedMessage.style.display = 'block';

            myTimeout= setTimeout(function () {
                            bookAddedMessage.style.display = 'none';
                            button.style.display = 'block';
                            var isbn = button.getAttribute('isbn');
                            window.location.href = 'insert.php?id=' + isbn;
                        }, 1000);
                  
                    }
            });
    });

    setTimeout(function(){
        document.getElementById("customAlert").style.display = "none";
    }, 5000);
    

   