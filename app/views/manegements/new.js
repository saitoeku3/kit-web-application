window.addEventListener('DOMContentLoaded', () => {
  const fileInput = document.getElementById('customFile')
  const imageInput = document.getElementById('image-input')
  const img = document.getElementById('preview')

  fileInput.onchange = event => {
    const [file] = event.target.files
    const reader = new FileReader()
    reader.onload = event => {
      img.src = event.target.result
      imageInput.value = event.target.result
    }
    reader.readAsDataURL(file)
  }
})
