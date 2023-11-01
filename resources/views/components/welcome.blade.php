<form class="p-6 lg:p-8 bg-white border-b border-gray-200  w-full">
    <div class="flex flex-col">
        <label class="font-bold pe-4">Post titel</label>
        <input type="text" class="rounded-lg mb-3 grow" >
    </div>

    <label class="font-bold pe-4">Bericht</label>
    <div id="toolbar" class="rounded-t-lg" placeholder="Balabala" autofocus></div>
    <div id="editor" class="mb-5 min-h-[15em] rounded-b-lg" placeholder="Balabala" autofocus></div>
    <label for="category" class="block mb-2 text-sm text-gray-900 font-bold">Selecteer een categorie</label>
    <select id="category" class="bg-gray-50 mb-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option selected>Selecteer een categorie</option>
        <option value="US">United States</option>
        <option value="CA">Canada</option>
        <option value="FR">France</option>
        <option value="DE">Germany</option>
    </select>
    <div class="flex justify-end">
        <button class="rounded-full sendbutton flex w-fit p-2 px-4 justify-center align-center whitespace-nowrap">
            Pronk je post! <i class="fas fa-paper-plane ps-2 pt-1"></i>
        </button>
    </div>
</form>
