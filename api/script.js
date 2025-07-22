// script.js

// helper para POST JSON e resposta JSON
async function postJson(url, data) {
  const res = await fetch(url, {
    method: 'POST',
    headers: { 'Content-Type':'application/json' },
    body: JSON.stringify(data)
  });
  return res.json();
}

// Registo
document.getElementById('registerForm')?.addEventListener('submit', async e => {
  e.preventDefault();
  const form = e.target;
  const data = {
    name:     form.name.value,
    email:    form.email.value,
    password: form.password.value
  };
  const resp = await postJson('api/register.php', data);
  if (resp.success) window.location = 'login.php';
  else alert(resp.error);
});

// Login
document.getElementById('loginForm')?.addEventListener('submit', async e => {
  e.preventDefault();
  const form = e.target;
  const resp = await postJson('api/login.php', {
    email: form.email.value,
    password: form.password.value
  });
  if (resp.success) window.location = 'reserva.php';
  else alert(resp.error);
});

// Submeter pedido
document.getElementById('orderForm')?.addEventListener('submit', async e => {
  e.preventDefault();
  const form = e.target;
  // assume inputs name="vessel","port","date","notes" e checkboxes nome="services"
  const services = Array.from(form.querySelectorAll('input[name=services]:checked'))
                        .map(ch => ch.value);
  const resp = await postJson('api/order.php', {
    vessel: form.vessel.value,
    port:   form.port.value,
    date:   form.date.value,
    services,
    notes:  form.notes.value
  });
  if (resp.success) {
    alert('Pedido enviado! ID: '+resp.order_id);
    loadHistory();
  } else alert(resp.error);
});

// Carregar histórico de pedidos
async function loadHistory() {
  const res = await fetch('api/history.php');
  const list = await res.json();
  const tbody = document.querySelector('#history tbody');
  tbody.innerHTML = '';
  list.forEach(o => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${o.date_estimated}</td>
      <td>${o.services}</td>
      <td>${o.status}</td>
      <td><a href="download_fatura.php?order_id=${o.id}">Download</a></td>`;
    tbody.appendChild(tr);
  });
}

// Na página reserva, ao carregar, busca histórico:
if (document.getElementById('history')) loadHistory();

