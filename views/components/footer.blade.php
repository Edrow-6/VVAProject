<footer class="bg-gray-300 shadow-inner">
  <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
    <div class="flex justify-center space-x-6 md:order-2">

      <form method="post">
        <select name="seasons" id="seasons-theme" onchange="this.form.submit();" class="flex items-center bg-gray-200 border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          <option value="spring"><i class="fal fa-flower"></i> Printemps</option>
          <option value="summer"><i class="fal fa-sun"></i> Été</option>
          <option value="autumn"><i class="fal fa-leaf-oak"></i> Automne</option>
          <option value="winter"><i class="fal fa-snowflake"></i> Hiver</option>
        </select>
      </form>

      <a href="https://twitter.com/Edrow__" target="_blank" class="flex items-center text-twitter hover:scale-110 duration-150 hover:text-blue-600">
        <span class="sr-only">Twitter</span>
        <i class="fab fa-twitter fa-lg"></i>
      </a>

      <a href="https://github.com/Edrow-6" target="_blank" class="flex items-center text-github hover:scale-110 duration-150 hover:text-gray-600">
        <span class="sr-only">GitHub</span>
        <i class="fab fa-github fa-lg"></i>
      </a>
    </div>
    <div class="flex space-x-4 mt-8 md:mt-0 md:order-1">
      <img class="w-10" src="@asset('logo_dark')">
      <p class="text-center text-base text-gray-500">
        {{-- &copy; date('Y') Dawbee, Sarl. Tous droits réservés. text-color-700 --}}
        Codé en France avec "amour" par Edrow
      </p>
    </div>
  </div>
</footer>