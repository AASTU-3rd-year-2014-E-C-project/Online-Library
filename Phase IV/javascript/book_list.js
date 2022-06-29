/* ************************ Genre Dropdown ********************/

var checkList = document.getElementById('list1');
var items = document.getElementById('items');
checkList.getElementsByClassName('anchor')[0].onclick = function (evt) {
    if (items.classList.contains('visible')) {
        items.classList.remove('visible');
        items.style.display = "none";
    }

    else {
        items.classList.add('visible');
        items.style.display = "block";
    }


}

items.onblur = function (evt) {
    items.classList.remove('visible');
}

/*********************** When a book card is clicked ***********************************/

var bookCards = document.querySelectorAll('.book-card');

bookCards.forEach(card => {
    card.addEventListener('click', () => {
        // location.href = '../public/book1_desc.php?resource_id=' + card.classList[1];
        console.log('clicked')
    })
});

/****************************** jQuery for AJAX implementation *************************************/

$(document).ready(function () {
    $(".book-container").on("click", ".book-card", function () {
        console.log($(this)[0].classList[1])
        location.href = '../public/book1_desc.php?resource_id=' + $(this)[0].classList[1];
    });

    // search button clicked
    $('.search-input-btn').on('click', function () {
        const resource_type = document.querySelector('.click').innerHTML;
        $.ajax({
            type: "GET",
            url: "../inc/booklist_ajax.php",
            data: {
                resource_type: resource_type,
                search: $('#search-box').val()
            },
            dataType: 'html',
            success: function (response) {
                bookContainer.innerHTML = response;
            }
        });
    });

    // reset button clicked
    $('.reset-search-btn').on('click', function () {
        const resource_type = document.querySelector('.click').innerHTML;
        $('#search-box').val('');
        $.ajax({
            type: "GET",
            url: "../inc/booklist_ajax.php",
            data: {
                resource_type: resource_type,
                search: ""
            },
            dataType: 'html',
            success: function (response) {
                bookContainer.innerHTML = response;
            }
        });
    });

    const bookContainer = document.querySelector('.book-container');

    $.ajax({
        type: "GET",
        url: "../inc/booklist_ajax.php",
        data: {
            resource_type: "Book"
        },
        dataType: 'html',
        success: function (response) {
            bookContainer.innerHTML = response;
        }
    });

    $(".books-tab-btn").click(function (e) {
        $.ajax({
            type: "GET",
            url: "../inc/booklist_ajax.php",
            data: {
                resource_type: "Book"
            },
            success: function (response) {
                bookContainer.innerHTML = response;
            }
        });
    });
    $(".research-tab-btn").click(function (e) {
        $.ajax({
            type: "GET",
            url: "../inc/booklist_ajax.php",
            data: {
                resource_type: "Research"
            },
            success: function (response) {
                bookContainer.innerHTML = response;
            }
        });
    });
    $(".assignments-tab-btn").click(function (e) {
        $.ajax({
            type: "GET",
            url: "../inc/booklist_ajax.php",
            data: {
                resource_type: "Assignment"
            },
            success: function (response) {
                bookContainer.innerHTML = response;
            }
        });
    });
    $(".tests-tab-btn").click(function (e) {
        $.ajax({
            type: "GET",
            url: "../inc/booklist_ajax.php",
            data: {
                resource_type: "Test and Quiz"
            },
            success: function (response) {
                bookContainer.innerHTML = response;
            }
        });
    });
});

//resource types tab underlining
const tabs = document.querySelectorAll('.type-tab')
tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        tabs.forEach(t => {
            t.classList.remove('click')
        })
        tab.classList.add('click')
    })
})

