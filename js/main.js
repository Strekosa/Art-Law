import filteredPosts from  './filtered-posts.js'

document.addEventListener('DOMContentLoaded', () => {
    const defaultOptions = {
        nonce: window.altumMainParams.nonce,
        rest_url: window.altumMainParams.rest_url
    }

    const articlesOptions = {
        ...defaultOptions,
        filterQuery: window.altumMainParams.filterQuery
    }

    const booksOptions = {
        ...defaultOptions,
        filterQuery: window.altumMainParams.booksQuery
    }

    document.querySelectorAll('.articles').forEach(root => {
        filteredPosts(root, {
            buttons: '.articles-filter',
            container: '.articles-main',
            paginations: '.articles-arrows'
        }, articlesOptions, 'posts')
    });

    document.querySelectorAll('.books').forEach(root => {
        filteredPosts(root, {
            buttons: '.articles-filter',
            container: '.books-reviews',
            paginations: '.articles-arrows'
        }, booksOptions, 'books')
    })
})


