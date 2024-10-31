// If cookie is removed, check the local storage. If this is true, create the coockie.
if (typeof gaoo_data !== 'undefined' && document.cookie.indexOf(gaoo_data.disable_string + '=true') == -1 && gaoo_localstorage('get', gaoo_data.disable_string) == 'true') {
  gaoo_create_cookie();
}

function gaoo_localstorage(method, name, value) {
  try {
    if ('localStorage' in window && window['localStorage'] !== null) {
      if (method == 'set' && typeof name !== 'undefined' && typeof value !== 'undefined') {
        localStorage.setItem(name, value);
      }

      if (method == 'get' && typeof name !== 'undefined') {
        return localStorage.getItem(name);
      }
    }
  } catch (e) {
    return false;
  }
}

function gaoo_remove_cookie() {
  document.cookie = gaoo_data.disable_string + '=; expires=Thu, 01 Jan 1970 00:00:01 UTC; path=/';
  window[gaoo_data.disable_string] = false;
  gaoo_localstorage('set', gaoo_data.disable_string, false);

  document.cookie = gaoo_data.generic_disable_string + '=; expires=Thu, 01 Jan 1970 00:00:01 UTC; path=/';
  window[gaoo_data.generic_disable_string] = false;
  gaoo_localstorage('set', gaoo_data.generic_disable_string, false);
}

function gaoo_create_cookie() {
  document.cookie = gaoo_data.disable_string + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
  window[gaoo_data.disable_string] = true;
  gaoo_localstorage('set', gaoo_data.disable_string, true);

  document.cookie = gaoo_data.generic_disable_string + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
  window[gaoo_data.generic_disable_string] = true;
  gaoo_localstorage('set', gaoo_data.generic_disable_string, true);
}

function gaoo_handle_optout() {
  var link = document.getElementById('gaoo-link');

  if (document.cookie.indexOf(disableStr + '=true') > -1) {
    gaoo_remove_cookie();

    if (gaoo_data.hasOwnProperty('popup_activate')) {
      alert(gaoo_data.popup_activate);
    }

    window.dispatchEvent(new CustomEvent('gaoptout', {detail: false}));

    link.innerHTML = gaoo_data.link_deactivate;
  }
  else {
    gaoo_create_cookie();

    if (gaoo_data.hasOwnProperty('popup_deactivate')) {
      alert(gaoo_data.popup_deactivate);
    }

    window.dispatchEvent(new CustomEvent('gaoptout', {detail: true}));

    link.innerHTML = gaoo_data.link_activate;
  }

  link.className = link.className.replace(/\b-deactivate\b/, '-activate');

  if (gaoo_data.hasOwnProperty('force_reload') && gaoo_data.force_reload == true) {
    location.reload();
  }
}