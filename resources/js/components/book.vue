<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <h1>My Book List</h1>
        <div class="form-group">
          <!-- form needs validation -->
          <!-- need loading for crud -->
          <label for="title">Title:</label>
          <input required class="form-control" type="text" name="title" v-model="newBook.title">
        </div>
        <div class="form-group">
          <label for="author">Author:</label>
          <input required class="form-control" type="text" name="author" v-model="newBook.author">
        </div>
        <div class="form-group">
          <label for="publication_date">Publication Date:</label>
          <input required class="form-control" type="date" name="publicationDate" v-model="newBook.publication_date">
        </div>
        <button @click.prevent="addBook()"></span> ADD BOOK</button>
      </div>
    </div>
        <div class="row">
        <div class="col-sm">
          <ol>
            <li v-for="book in orderedBookList" :key="book.id">
              <div>
                {{book.title}}
                <button @click.prevent="deleteBook(book)">delete</button>
              </div>
            </li>
          </ol>
        </div>
          <div class="col-sm">

          </div>
      </div>
  </div>
</template>

<script>
    export default {
      data() {
          return {
            newBook: {
              title: '',
              author: '',
              publication_date: '',
              order: ''
            },
            bookList: [],
            showAddBook: false,
          }
        },
        mounted() {
          // this.getBookList();
        },
        computed: {
          orderedBookList() {
            let orderedBookList;
              //es 6 syntax because it's easier to read
            orderedBookList = this.bookList.sort((a,b) => a.order - b.order)
            return orderedBookList;
          },
        },
        methods: {
          deleteBook(book) {
            axios.post('/deleteBook', book.id).then((response) => {
              this.getBookList();
            })
          },
          addBook() {
            // needs validation
            const input = this.newBook;
            console.log(input);
            axios.post('/addBook', input).then((response) => {
              this.clear()
              this.getBookList();
            })
          },
          clear() {
            this.newBook = {
              title: '',
              author: '',
              order: ''
            }
          },
          getBookList() {
            axios.get('/index').then((response) => {
              this.bookList = response.book;
          })
        }
      }
    }
</script>
