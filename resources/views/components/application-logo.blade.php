<img src="{{ asset('img/logo.png') }}" class="logo-light w-30 h-20 fill-current text-gray-500">
<img src="{{ asset('img/logo-dark.png') }}" class="logo-dark w-30 h-20 fill-current text-gray-500">

<style>
  .logo-light {
    display: none;
  }

  .logo-dark {
    display: none;
  }

  @media (prefers-color-scheme: dark) {
    .logo-light {
      display: none;
    }

    .logo-dark {
      display: block;
    }
  }

  @media (prefers-color-scheme: light) {
    .logo-light {
      display: block;
    }

    .logo-dark {
      display: none;
    }
  }
</style>

<script>
  function updateLogo() {
    const isDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    document.querySelector('.logo-light').style.display = isDarkMode ? 'none' : 'block';
    document.querySelector('.logo-dark').style.display = isDarkMode ? 'block' : 'none';
  }

  // Atualizar o logotipo ao carregar a página
  document.addEventListener('DOMContentLoaded', updateLogo);

  // Atualizar o logotipo ao mudar o modo de cor
  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', updateLogo);
</script>
