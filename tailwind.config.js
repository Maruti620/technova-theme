/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: "class",
  content: [
    "./**/*.php",
    "./assets/js/**/*.js",
    "./preview/**/*.html"
  ],
  theme: {
    extend: {
      fontFamily: {
        display: ["Manrope", "Inter", "system-ui", "sans-serif"],
        body: ["Manrope", "Inter", "system-ui", "sans-serif"]
      },
      colors: {
        brand: {
          50: "#eef2ff",
          100: "#e0e7ff",
          200: "#c7d2fe",
          300: "#a5b4fc",
          400: "#818cf8",
          500: "#6366f1",
          600: "#4f46e5",
          700: "#4338ca",
          800: "#3730a3",
          900: "#312e81"
        },
        accent: "#0ea5e9"
      },
      boxShadow: {
        glow: "0 20px 50px -20px rgba(99,102,241,0.45)",
        card: "0 10px 30px -18px rgba(15,23,42,0.35)"
      },
      backgroundImage: {
        "mesh-light": "radial-gradient(circle at 10% 20%, rgba(99,102,241,0.15), transparent 25%), radial-gradient(circle at 80% 0%, rgba(14,165,233,0.12), transparent 20%), radial-gradient(circle at 50% 80%, rgba(56,189,248,0.12), transparent 20%)",
        "mesh-dark": "radial-gradient(circle at 10% 20%, rgba(99,102,241,0.2), transparent 25%), radial-gradient(circle at 80% 0%, rgba(14,165,233,0.18), transparent 20%), radial-gradient(circle at 50% 80%, rgba(56,189,248,0.16), transparent 20%)"
      }
    },
  },
  plugins: [
    require("@tailwindcss/typography")
  ],
}
