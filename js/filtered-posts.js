

import { isString } from "./utils"
const defaultSelectors = {
    buttons: '.filter-buttons',
    container: '.filter-container',
    paginations: '.filter-arrows'
}
const parseSelectors = (selectors) => {
    const elements = { ...defaultSelectors, ...selectors }
    for (const key in elements) {
        elements[key] = isString(elements[key])
            ? document.querySelector(elements[key])
            : elements[key]
        // if (!elements[key]) {
        //     throw new Error(`${selectors[key]} is not found`)
        // }
    }
    return elements
}
export default function (root, selectors, options = {}, rest_route = 'posts') {
    root = isString(root) ? document.querySelector(root) : root
    if (!root) return
    const { rest_url, nonce, filterQuery } = options
    const { buttons, container, paginations } = parseSelectors(selectors)
    const request = async (route, params, method = 'POST', body = null) => {
        const response = await fetch(`${rest_url}/${route}`, {
            method,
            body: JSON.stringify(params),
            headers: {
                'Content-Type': 'application/json',
                'X-WP-Nonce': nonce
            },
        })
        return await response.json()
    }
    const verifyPagination = response => {
        const prevButton = paginations.querySelector('[data-filter-paged="-"]')
        const nextButton = paginations.querySelector('[data-filter-paged="+"]')
        nextButton.disabled = response?.current_page === response?.max_num_pages
        prevButton.disabled = response?.current_page === 1 || response?.found_posts <= filterQuery.posts_per_page
    }
    if (buttons) {
        buttons.addEventListener('click', async e => {
            const button = e.target.closest('[data-filter-tag]')

            if (!button) return

            container.classList.add('is-loading')

            filterQuery.paged = 1
            const tag = button.dataset.filterTag
            buttons.querySelectorAll('[data-filter-tag]').forEach(b => b.classList.remove('is-active'))

            if (tag === filterQuery.tag_id) {
                delete filterQuery.tag_id
            } else {
                filterQuery.tag_id = tag
                button.classList.add('is-active')
            }

            const response = await request(rest_route, filterQuery)
            verifyPagination(response)
            container.innerHTML = response.data

            container.classList.remove('is-loading')
        })
    }
    paginations.addEventListener('click', async e => {
        const button = e.target.closest('[data-filter-paged]')
        if (!button) return
        container.classList.add('is-loading')
        const action = button.dataset.filterPaged
        const paged = action === '+'
            ? filterQuery.paged + 1
            : filterQuery.paged - 1
        const response = await request(rest_route, { ...filterQuery, paged })
        filterQuery.paged = response.current_page
        verifyPagination(response)
        container.innerHTML = response.data
        container.classList.remove('is-loading')
    })
}