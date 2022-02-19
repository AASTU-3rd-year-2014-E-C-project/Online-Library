const form = document.querySelector('.add-comment-form')
const b = document.querySelector('.body')
function commentPopup(){
    b.classList.add('dark')
    form.classList.add('show')
}

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

    singleComment.innerHTML = `
        <div class="profile-pic-container">
            <img src="resources/covers/default-cover.png" alt="" class="profile-pic">
        </div>
        <div class="name-date">
            <h3 class="comment-giver-name">${firstName.value + ' ' + lastName.value}</h3>
            <h4 class="date-and-time">Feb 17, 2022 @ 8:07</h4>
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