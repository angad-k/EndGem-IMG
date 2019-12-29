const url = 'add.php'
const form = document.querySelector('form')

form.addEventListener('submit', e => {
  e.preventDefault()

  const file = document.querySelector('[type=file]').file
  const title = document.querySelector('[type=text]').title
  const formData = new FormData()

  formData.append('file', file)
  formData.append('title', title)

  fetch(url, {
    method: 'POST',
    body: formData,
  }).then(response => {
    console.log(response)
  })
})