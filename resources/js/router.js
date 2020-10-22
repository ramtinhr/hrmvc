import { routes } from './routes'

// document root element to append child
const rootDiv = document.getElementById('root')

// change the innerHTML of the root element
rootDiv.innerHTML = routes[window.location.pathname]().innerHTML

window.onpopstate = () => {
  rootDiv.innerHTML = routes[window.location.pathname]().innerHTML
}

const onNavigate = (pathName) => {
  window.history.pushState(
    {},
    pathName,
    window.location.origin + pathName
  )
  rootDiv.innerHTML = routes[pathName]().innerHTML
}

const a = document.createElement('a')
// a.setAttribute('href', '/about')
a.innerHTML = 'About'
a.setAttribute('href', '/about')
a.addEventListener('click', (event) => {
  event.preventDefault()
  onNavigate('/about')
  return false
})
rootDiv.appendChild(a)

export default onNavigate
