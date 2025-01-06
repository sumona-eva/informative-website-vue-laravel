module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js",
      'node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx,vue}',
      'node_modules/flowbite/**/*.{js,jsx,ts,tsx}'
    ],
    theme: {
      extend: {
        colors: {
          primary: '#1F2D3E',
          secondary: '#CD986C',
        }
      },
    },
    plugins: [
        require('flowbite/plugin')
    ],
  }
