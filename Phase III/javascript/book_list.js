/************************ Display Books **********************/
const book_container = document.querySelector('.book-container')

const imgUrl = ['biology-psychology-and-medicine.jpg', 
                'infinite-powers.jpg', 
                'mathematics-and-its-history.jpg',
                'principles-of-physics.jpg',
                'proofs-and-refutations.jpg', 
                'quantum-physics.jpg', 
                'string-theory.jpg', 
                'the-art-of-war.jpg', 
                'the-kite-runner.jpg', 
                'the-myth-of-sisyphus.jpg', 
                'the-paths-between-worlds.jpg', 
                'the-philosophy-of-history.jpg',
                'the-song-of-the-dodo.jpg',
                'the-vital-question.jpg', 
                'wuthering-heights.jpg']

const titleList = ['Biology, Psychology and Medicine',
                    'Infinite Powers', 
                    'Mathematics and its History', 
                    'Principles of Physics', 
                    'Proofs and Refutations', 
                    'Quantum Physics', 
                    'String Theory', 
                    'The Art of War', 
                    'The Kite Runner', 
                    'The Myth of Sisyphus', 
                    'The Paths Between Worlds', 
                    'The Philosophy of History', 
                    'The Song of the Dodo', 
                    'The Vital Question', 
                    'Wuthering Heights']

const authorList = ['Motimer J. Adler', 
                    'Steven Strogatz', 
                    'John Stillwell', 
                    'Halliday Resnick', 
                    'Imre Lakatos', 
                    'Carl J. Pratt', 
                    'Joseph Polchinski', 
                    'Sun Tzu', 
                    'Khaled Hosseini', 
                    'Albert Camus', 
                    'Paul Antony Jones', 
                    'G. W. F. Hegel', 
                    'David Quammen', 
                    'Nick Lane', 
                    'Emily Bronte']

                    
book_container.innerHTML = ''
for(var i = 0; i<titleList.length; i++){
    var cover = document.createElement('img')
    cover.src = 'covers/default-cover.png'
    
    var cover_container = document.createElement('div')
    cover_container.classList.add('cover-container')

    var title = document.createElement('div')
    title.classList.add('title')
    title.innerHTML = 'default-title'

    var author = document.createElement('div')
    author.classList.add('author')
    author.innerHTML = 'hello'

    book_card = document.createElement('div')
    book_card.classList.add('book-card')
    book_card.classList.add(i)

    title.innerHTML = titleList[i]
    author.innerHTML = authorList[i]
    cover.src = 'resources/covers/' + imgUrl[i]

    cover_container.innerHTML = ''
    book_card.innerHTML = ''

    cover_container.append(cover)
    book_card.append(cover_container, title, author)

    book_container.append(book_card)

}
/************************ End of Display Books *********************************/
const book_card_list = document.querySelectorAll('.book-card')

book_card_list.forEach(book => {
    book.addEventListener('click', () => {
        console.log(book.innerHTML)
        window.open('book1_desc.html?' + book.classList, '_blank')
    })
})

