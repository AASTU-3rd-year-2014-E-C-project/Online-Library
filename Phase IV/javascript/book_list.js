/************************ Display Books **********************/

// var booksList = [
//                 {cover: 'infinite-powers.jpg', title: 'Infinite Powers', author: 'Steven Strogatz', desc: 'Without calculus, we wouldn’t have cell phones, TV, GPS, or ultrasound. We wouldn\'t have unraveled DNA or discovered Neptune or figured out how to put 5,000 songs in your pocket.', genre: 'Science'}, 

//                 {cover: 'mathematics-and-its-history.jpg', title: 'Mathematics and its History', author: 'John Stillwell', desc: '[This book] can be described as a collection of critical historical essays dealing with a large variety of mathematical disciplines and issues, and intended for a broad audience we know of no book on mathematics and its history that covers half as much nonstandard material. Even when dealing with standard material, Stillwell manages to dramatize it and to make it worth rethinking. In short, his book is a splendid addition to the genre of works that build royal roads to mathematical culture for the many.', genre: 'Science'}, 

//                 {cover: 'proofs-and-refutations.jpg', title: 'Proofs and Refutations', author: 'Imre Lakatos', desc: 'Proofs and Refutations is essential reading for all those interested in the methodology, the philosophy and the history of mathematics. Much of the book takes the form of a discussion between a teacher and his students. They propose various solutions to some mathematical problems and investigate the strengths and weaknesses of these solutions. Their discussion (which mirrors certain real developments in the history of mathematics) raises some philosophical problems and some problems about the nature of mathematical discovery or creativity. Imre Lakatos is concerned throughout to combat the classical picture of mathematical development as a steady accumulation of established truths. He shows that mathematics grows instead through a richer, more dramatic process of the successive improvement of creative hypotheses by attempts to \'prove\' them and by criticism of these attempts: the logic of proofs and refutations.', genre: 'Philosophy'}, 

//                 {cover: 'quantum-physics.jpg', title: 'Quantum Physics', author: 'Carl J. Pratt', desc: 'Award-winner scientist, Carl J. Pratt, presents the most exhaustive and clear introduction to the topic. “Quantum Physics for Beginners” peels away layers of mystery to reveal what is behind most modern technological innovations. Even if this is the first time that you are hearing these terms don\'t be discouraged by these big words. This book is written specifically for people approaching this topic for the first time. Professor Pratt will take you by the hand on a two-century journey to discover the principles that govern the universe.', genre: 'Science'}, 

//                 {cover: 'string-theory.jpg', title: 'String Theory', author: 'Joseph Polchinski', desc: 'The two volumes that comprise String Theory provide an up-to-date, comprehensive account of string theory. Volume 1 provides a thorough introduction to the bosonic string, based on the Polyakov path integral and conformal field theory. The first four chapters introduce the central ideas of string theory, the tools of conformal field theory, the Polyakov path integral, and the covariant quantization of the string. The book then treats string interactions: the general formalism, and detailed treatments of the tree level and one loop amplitudes. Toroidal compactification and many important aspects of string physics, such as T-duality and D-branes are also covered, as are higher-order amplitudes, including an analysis of their finiteness and unitarity, and various nonperturbative ideas. The volume closes with an appendix giving a short course on path integral methods, followed by annotated references, and a detailed glossary.', genre: 'Science'}, 

//                 {cover: 'the-art-of-war.jpg', title: 'The Art of War', author: 'Sun Tzu', desc: 'Twenty-Five Hundred years ago, Sun Tzu wrote this classic book of military strategy based on Chinese warfare and military thought. Since that time, all levels of military have used the teaching on Sun Tzu to warfare and civilization have adapted these teachings for use in politics, business and everyday life. The Art of War is a book which should be used to gain advantage of opponents in the boardroom and battlefield alike.', genre: 'Non-fiction'}, 

//                 {cover: 'the-kite-runner.jpg', title: 'The Kite Runner', author: 'Khaled Hosseini', desc: 'The unforgettable, heartbreaking story of the unlikely friendship between a wealthy boy and the son of his father’s servant, The Kite Runner is a beautifully crafted novel set in a country that is in the process of being destroyed. It is about the power of reading, the price of betrayal, and the possibility of redemption; and an exploration of the power of fathers over sons—their love, their sacrifices, their lies. A sweeping story of family, love, and friendship told against the devastating backdrop of the history of Afghanistan over the last thirty years, The Kite Runner is an unusual and powerful novel that has become a beloved, one-of-a-kind classic.', genre: 'Novel'}, 

//                 {cover: 'the-myth-of-sisyphus.jpg', title: 'The Myth of Sisyphus', author: 'Albert Camus', desc: 'One of the most influential works of this century, this is a crucial exposition of existentialist thought. Influenced by works such as Don Juan, and the novels of Kafka, these essays begin with a meditation on suicide: the question of living or not living in an absurd universe devoid of order or meaning. With lyric eloquence, Camus posits a way out of despair, reaffirming the value of personal existence, and the possibility of life lived with dignity and authenticity.', genre: 'Non-fiction'}, 

//                 {cover: 'the-paths-between-worlds.jpg', title: 'The Paths Between Worlds', author: 'Paul Antony Jones', desc: 'After a devastating car crash leaves her addicted to pain pills and her best friend dead, Meredith Gale has finally been pushed beyond her breaking point. Ending her life seems like the only way out, and that choice has left her dangling by her fingertips from a bridge above the freezing water of the San Francisco Bay. With the help of her new companions, Meredith sets out on an impossible journey to find the one person who can solve the riddle of why they were brought to this strange, alien Earth… assuming they can survive the dangers that lurk within this new world and the dark forces massing against them.', genre: 'Novel'}, 

//                 {cover: 'the-philosophy-of-history.jpg', title: 'The Philosophy of History', author: 'G. W. F. Hegel', desc: 'Hegel wrote this classic as an introduction to a series of lectures on the "philosophy of history" — a novel concept in the early nineteenth century. With this work, he created the history of philosophy as a scientific study. He reveals philosophical theory as neither an accident nor an artificial construct, but as an exemplar of its age, fashioned by its antecedents and contemporary circumstances, and serving as a model for the future. The author himself appears to have regarded this book as a popular introduction to his philosophy as a whole, and it remains the most readable and accessible of all his philosophical writings.', genre: 'Philosophy'}, 

//                 {cover: 'the-song-of-the-dodo.jpg', title: 'The Song of the Dodo', author: 'David Quammen', desc: 'In The Song of the Dodo, we follow Quammen\'s keen intellect through the ideas, theories, and experiments of prominent naturalists of the last two centuries. We trail after him as he travels the world, tracking the subject of island biogeography, which encompasses nothing less than the study of the origin and extinction of all species. Why is this island idea so important? Because islands are where species most commonly go extinct -- and because, as Quammen points out, we live in an age when all of Earth\'s landscapes are being chopped into island-like fragments by human activity.', genre: 'Non-fiction'}, 

//                 {cover: 'the-vital-question.jpg', title: 'The Vital Question', author: 'Nick Lane', desc: 'The Earth teems with life: in its oceans, forests, skies and cities. Yet there’s a black hole at the heart of biology. We do not know why complex life is the way it is, or, for that matter, how life first began. In The Vital Question, award-winning author and biochemist Nick Lane radically reframes evolutionary history, putting forward a solution to conundrums that have puzzled generations of scientists.', genre: 'Science'}, 

//                 {cover: 'wuthering-heights.jpg', title: 'Wuthering Heights', author: 'Emily Bronte', desc: 'Five major critical interpretations of Wuthering Heights are included, three of them new to the Fourth Edition. A Stuart Daley considers the importance of chronology in the novel. J. Hillis Miller examines Wuthering Heights\'s problems of genre and critical reputation. Sandra M. Gilbert assesses the role of Victorian Christianity plays in the novel, while Martha Nussbaum traces the novel\'s romanticism. Finally, Lin Haire-Sargeant scrutinizes the role of Heathcliff in film adaptations of Wuthering Heights.', genre: 'Fiction'}, ]




// var filterList = []
// function filterFunc(filterText){
//     filterList = []
//     booksList.forEach(book => {
//         console.log()
//         if(book.title.toLowerCase().includes(filterText.toLowerCase()) || book.author.toLowerCase().includes(filterText.toLowerCase())){
//             filterList.push(book)
//         }
//     });
// }

// filterFunc('')




// function searchText(){
//     const searchInput = document.getElementById('search-box')
//     console.log(searchInput.value)
//     filterFunc(searchInput.value)
//     displayBooks(-1)
// }
// function resetText(){
//     const searchInput = document.getElementById('search-box')
//     searchInput.value = ''
//     filterFunc('')
//     displayBooks(-1)
// }

// const searchInput = document.getElementById('search-box')

// searchInput.addEventListener('keyup', (e) => {
//     if(e.key == 'Enter')
//         searchText()
// })


// function displayBooks(related){
//     if(related != -1){
//         filterList = []
//         booksList.forEach(book => {
//         if(book.genre.toLowerCase().includes(booksList[related].genre.toLowerCase())){
//             filterList.push(book)
//         }

//         });
//     }
//         const book_container = document.querySelector('.book-container')
//         book_container.innerHTML = ''
//         for(var i = 0; i<filterList.length; i++){
//             var cover = document.createElement('img')
//             cover.src = 'covers/default-cover.png'

//             var cover_container = document.createElement('div')
//             cover_container.classList.add('cover-container')

//             var title = document.createElement('div')
//             title.classList.add('title')
//             title.innerHTML = 'default-title'

//             var author = document.createElement('div')
//             author.classList.add('author')
//             author.innerHTML = 'hello'

//             var genre = document.createElement('div')
//             genre.classList.add('genre')
//             genre.innerHTML = 'default-genre'

//             book_card = document.createElement('div')
//             book_card.classList.add('book-card')
//             book_card.classList.add(i)

//             title.innerHTML = filterList[i].title
//             author.innerHTML = filterList[i].author
//             cover.src = 'resources/covers/' + filterList[i].cover
//             genre.innerHTML = filterList[i].genre

//             cover_container.innerHTML = ''
//             book_card.innerHTML = ''

//             cover_container.append(cover)
//             book_card.append(cover_container, title, author, genre)

//             book_container.append(book_card)
//         }
//         function bookDescOnLoad(selectedBookTitle){
//             for(let i = 0; i<booksList.length; i++){
//                 if(booksList[i].title == selectedBookTitle){
//                     return i
//                 }
//             }
//         }

//         const book_card_list = document.querySelectorAll('.book-card')

//         book_card_list.forEach(book => {
//             book.addEventListener('click', () => {
//                 console.log(book.childNodes[1].innerText)
//                 window.open('book1_desc.html?' + bookDescOnLoad(book.childNodes[1].innerText), '_blank')
//             })
//         })
// }

// function donateBook(){
//     const donateTitle = document.getElementById('donateTitle').value
//     const donateAuthor = document.getElementById('donateAuthor').value
//     const donateDesc = document.getElementById('donateDesc').value
//     const donateGenre = document.getElementById('donateGenre').value

//     booksList.push({cover: 'resources/covers/default-cover.png', title: donateTitle, author: donateAuthor, desc: donateDesc, genre: donateGenre})
// }
// /************************ End of Display Books *********************************/

// /**********************Function for book description ********************/


// function onLoadFunction(){
//     var index = location.search.substring(1)
//     //book information
//     const cover = filterList[index].cover
//     const title = filterList[index].title
//     const author = filterList[index].author
//     const description = filterList[index].desc
//     const genre = filterList[index].genre

//     document.title = title + ' - Book Description'

//     displayBooks(index)

//     const bookDescContainer = document.querySelector('.book')
//     bookDescContainer.innerHTML = ''
//     bookDescContainer.innerHTML = `
//     <div class="cover-container">
//     <img src="${'resources/covers/' + cover}" alt="${title}">
// </div>
// <div class=" title ">
//     <h1 class="book_title ">${title}</h1>
// <h4 class="book_genre">${'Genre: ' + genre}</h4>
//     <p class=" book_desc ">${description}</p>
// </div>


// <h3 class="book_author">${'by: ' + author}</h3>

// <div class="buttons">
//     <a href="book1.html " class="read-btn">Read Online</button></a>
//     <a href="resources/Books/the_philosophy_of_history.pdf " class="download-btn" Download>Download</a>
// </div>
//     `

//     displayBooks(-1)
// }

// function readOnLoad(){
//     const htmlTitle = document.getElementById('htmlTitle')
//     const bookTitle = document.querySelector('.book_title_read')

//     htmlTitle.innerText = booksList[indexx].title + ' - Read Online'
//     bookTitle.innerHTML = ' - Read Online'

// }

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

    $('.search-input-btn').on('click', function () {
        $.ajax({
            type: "GET",
            url: "../inc/booklist_ajax.php",
            data: {
                resource_type: "Book",
                search: $('#search-box').val()
            },
            dataType: 'html',
            success: function (response) {
                bookContainer.innerHTML = response;
            }
        });
    });

    $('.reset-input-btn').on('click', function () {
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
                resource_type: "Research book"
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

