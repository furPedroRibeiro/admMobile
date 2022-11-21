window.onload = () => {
  const opcoes = {
    method: 'GET',
    mode: 'cors',
    cache: 'default'
  }
  fetch(`https://adinfinutum.profrodolfo.com.br/testeJson.txt`, opcoes).then(
    response => {
      response.json()
      let exibir = codigo + categoria
      alert(exibir)
    }
  )
}
