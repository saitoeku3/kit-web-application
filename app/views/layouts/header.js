window.addEventListener('DOMContentLoaded', () => {
  let text = ''
  const searchForm = document.getElementById('search-form')
  searchForm.onchange = event => {
    text = event.target.value
  }
  searchForm.onsubmit = event => {
    event.preventDefault()
    location.replace(`/kit-web-application/search?q=${encodeURI(text)}`)
  }
})
