import './bootstrap';

const imported = import.meta.glob('../icons/*.svg', { eager: true, import: 'default' });
window.Icons = Object.fromEntries(
    Object.entries(imported).map(([path, module]) => {
        const name = path.split('/').pop().replace('.svg', '');
        return [name, module];
    })
);



import shoppingCart  from '@/icons/shopping-cart.svg?raw';
import users         from '@/icons/users.svg?raw';
import clipboardList from '@/icons/clipboard-list.svg?raw';
import boxes         from '@/icons/boxes.svg?raw';
import fileInvoice   from '@/icons/file-text.svg?raw';
import creditCard    from '@/icons/credit-card.svg?raw';

window.bcIcons = {
  'shopping-cart': shoppingCart,
  'users': users,
  'clipboard-list': clipboardList,
  'boxes': boxes,
  'file-invoice': fileInvoice,
  'credit-card': creditCard,
};

document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-icon]').forEach(el => {
    const name = el.dataset.icon;
    const svg  = window.bcIcons?.[name] || '';
    if (svg) {
      el.innerHTML = svg;
      const s = el.firstElementChild;
      if (s && s.tagName.toLowerCase() === 'svg') {
        s.classList.add('w-6','h-6');
      }
    }
  });
});
