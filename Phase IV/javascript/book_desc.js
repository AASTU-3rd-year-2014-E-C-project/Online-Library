/******* Add Comment Function ***************/
const form = document.querySelector('.add-comment-form')
const b = document.querySelector('.body')
function commentPopup(){
    b.classList.add('dark')
    form.classList.add('show')
}

$(document).ready(function (){
    console.log('before')
    $.ajax({
        url: "get-data.php",
        type: "POST",
        data: '{}',
        contentType: "json",
        success: function (data){
            console.log(JSON.parse(data))
                $('.bar-5').css('width', ((JSON.parse(data).r5/JSON.parse(data).total) * 100) + '%');
                $('.bar-4').css('width', ((JSON.parse(data).r4/JSON.parse(data).total) * 100) + '%');
                $('.bar-3').css('width', ((JSON.parse(data).r3/JSON.parse(data).total) * 100) + '%');
                $('.bar-2').css('width', ((JSON.parse(data).r2/JSON.parse(data).total) * 100) + '%');
                $('.bar-1').css('width', ((JSON.parse(data).r1/JSON.parse(data).total) * 100) + '%');

                $('.count-rate-5').html(JSON.parse(data).r5)
                $('.count-rate-4').html(JSON.parse(data).r4)
                $('.count-rate-3').html(JSON.parse(data).r3)
                $('.count-rate-2').html(JSON.parse(data).r2)
                $('.count-rate-1').html(JSON.parse(data).r1)
        }
    })
})

function closePopup(){
    b.classList.remove('dark')
    form.classList.remove('show')
}

//accept input from the comment pop up dialog
const addBtn = document.getElementById('addCommBtn')
const cancelBtn = document.getElementById('cancelCommBtn')

addBtn.addEventListener('click', () => {
    const firstName = document.querySelector('.first-name-input')
    const lastName = document.querySelector('.last-name-input')
    const commentText = document.querySelector('.comment-text-area')

    const comments = document.querySelector('.comments')
    const singleComment = document.createElement('div')
    singleComment.classList.add('comment')

    const d = new Date()

    singleComment.innerHTML = `
        <div class="profile-pic-container">
            <img src="resources/covers/default-cover.png" alt="" class="profile-pic">
        </div>
        <div class="name-date">
            <h3 class="comment-giver-name">${firstName.value + ' ' + lastName.value}</h3>
            <h4 class="date-and-time">${d.getDate() + '/' + d.getMonth() + '/' + d.getFullYear()} @ ${d.getHours() + ':' + d.getMinutes()}</h4>
        </div>
        <p class="comment-text">${commentText.value}</p>
    `
    comments.append(singleComment)

    firstName.value = ''
    lastName.value = ''
    commentText.value = ''

    closePopup()
})

cancelBtn.addEventListener('click', () => {
    closePopup()
})

//////////////////////////// End of Add Comment //////////////////////

