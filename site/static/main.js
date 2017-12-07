/* AjaxJson. */

let AjaxJson = function (url) {
  if (!(this instanceof AjaxJson)) {
    return new AjaxJson (url)
  }

  this.request = new XMLHttpRequest ()

  this.request.onreadystatechange = () => {
    try {
      if (this.request.readyState === 4) {
        let status = this.request.status
        if (status !== 200)
          throw new Error ("Invalid response status: " + status)

        this.data_handler (JSON.parse (this.request.responseText))
      }
    } catch (e) {
      this.error_handler (e)
    }
  }

  this.request.open ('GET', url)
}

AjaxJson.prototype.error = function (cb) {
  this.error_handler = cb
  return this
}

AjaxJson.prototype.data = function (cb) {
  this.data_handler = cb
  return this
}

AjaxJson.prototype.send = function () {
  try {
    this.request.send ()
  } catch (e) {
    this.error_handler (e)
  }
}

/* Sahih. */

let Sahih = function (e) {
  if (!(this instanceof Sahih)) {
    return new Sahih (e)
  }

  this.element = (typeof e === 'string') ? document.querySelector (e) : e
  this.badgeElement = this.element.parentNode.querySelector ('.badge')
  this.tooltipElement = this.element.parentNode.querySelector ('.tooltip')
}

Sahih.prototype.tooltip = function (value) {
  if (!this.tooltipElement)
    return

  if (value) {
    this.tooltipElement.classList.add ('show')
    this.tooltipElement.innerHTML = value
  } else {
    this.tooltipElement.classList.remove ('show')
  }

  return this
}

Sahih.prototype.badge = function (value) {
  if (!this.badgeElement)
    return
  
  if (value) {
    this.badgeElement.classList.add ('show')
    this.badgeElement.dataset.badge = value
  } else {
    this.badgeElement.classList.remove ('show')
  }

  return this
}

Sahih.prototype.invalidate = function (msg, status) {
  this.element.parentNode.dataset.status = status || 'sticky'
  this.tooltip (msg)

  return this
}

Sahih.prototype.validate = function () {
  this.element.parentNode.dataset.status = 'valid'
  this.tooltip (null)

  return this
}

Sahih.prototype.isValid = function () {
  return this.element.parentNode.dataset.status === 'valid'
}

Sahih.prototype.handle = function (cb) {
  this.element.onkeyup = (e) => {
    let msg = cb (e.target)

    if (msg) {
      this.badge (null)
      this.invalidate (msg, 'invalid')
    } else if (this.element.parentNode.dataset.status !== 'sticky' || !e.forged) {
      this.validate ()
    }
  }

  return this
}

Sahih.prototype.apply = function (cb) {
  let form = this.element.form
  
  form.onsubmit = (e) => {
    for (dom of form.querySelectorAll ('.validate')) {
      if (dom.dataset.status !== 'valid') {
        let input = dom.querySelector ('input')

        input.onkeyup ({ target: input, forged: true })
        input.focus ()

        return false
      }
    }

    return true
  }
}
