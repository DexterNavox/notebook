<style>
    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      position: absolute;
      top: 40%;
      left: 50%;
      width: 20%;
      transform: translate(-50%, -50%);
      background-color: #ecf0f5;
      padding: 23px;
      color: #060606;
    }

    .modal a {
      display: block;
      margin-bottom: 10px;
      color: #000;
      /* Cor dos links */
    }

    .modal a:hover {
      text-decoration: underline;
      /* Sublinhar os links ao passar o mouse */
    }

    .modal .close {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
      color: #000;
      /* Cor do botão de fechar */
    }
  </style>

<script>
    // Selecionar todos os elementos de link com a classe "modal-link"
    const modalLinks = document.querySelectorAll('.modal-link');
    // Adicionar um ouvinte de eventos para cada link
    modalLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        // Obter o ID do modal a partir do atributo data-modal-id
        const modalId = this.getAttribute('data-modal-id');
        // Abrir o modal correspondente ao ID
        const modal = document.getElementById(modalId);
        modal.style.display = 'block';
        // Adicionar um ouvinte de eventos para cada link dentro do modal
        const modalLinks = modal.querySelectorAll('a');
        modalLinks.forEach(link => {
          link.addEventListener('click', function() {
            modal.style.display = 'none';
          });
        });
        // Adicionar um atraso antes de redirecionar para o link
        const targetURL = this.getAttribute('href');
        setTimeout(() => {
          window.location.href = targetURL;
        }, 300);
      });
    });
    // Adicionar um ouvinte de eventos ao clique fora do modal
    window.addEventListener('click', function(e) {
      const modals = document.querySelectorAll('.modal');
      modals.forEach(modal => {
        if (e.target === modal) {
          modal.style.display = 'none';
        }
      });
    });
    // Selecionar todos os elementos de fechamento do modal
    const closeButtons = document.querySelectorAll('.modal .close');
    // Adicionar um ouvinte de eventos para cada botão de fechamento do modal
    closeButtons.forEach(button => {
      button.addEventListener('click', function() {
        // Fechar o modal pai do botão de fechamento
        const modal = this.closest('.modal');
        modal.style.display = 'none';
      });
    });
  </script>