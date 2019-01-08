
<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <h1>My Book List</h1>
        <div class="form-group">
          <!-- form needs validation -->
          <!-- need loading for crud -->
          <label for="title">Title:</label>
          <input v-validate="'required|min:3'" class="form-control" type="text" name="title" v-model="newBook.title">
          <span>{{ errors.first('title') }}</span>
        </div>
        <div class="form-group">
          <label for="author">Author:</label>
          <input v-validate="'required|min:3'" required class="form-control" type="text" name="author" v-model="newBook.author">
          <span>{{ errors.first('author') }}</span>
        </div>
        <div class="form-group">
          <label for="publication_date">Publication Date:</label>
          <input v-validate="'required|date_format:DD/MM/YYYY'" class="form-control" type="date" name="publicationDate" v-model="newBook.publication_date">
          <span>{{ errors.first('date') }}</span>
        </div>
        <button @click.prevent="addBook()"></span> ADD BOOK</button>
      </div>
    </div>
      <div class="row">
        <div class="col">
          <ol>
            <li v-for="book in orderedBookList" :key="book.id">
              <div>
                {{book.title}}
                <button @click.prevent="deleteBook(book)">delete</button>
                <button>details</button>
              </div>
              <div></div>
            </li>
          </ol>
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
              publication_date: ''
            },
            bookList: [],
            showAddBook: false,
          }
        },
        mounted() {
          this.getBookList();
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
            axios.post(`/deleteBook/${book.id}`).then((response) => {
              this.getBookList();
            })
          },
          addBook() {
            // needs validation
            const input = this.newBook;
            this.$validator.validate().then(result => {
              axios.post('/addBook', input).then((response) => {
                this.clear()
                this.getBookList();
              }
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
              this.bookList = response.data;
          })
        }
      }
    }
</script>
