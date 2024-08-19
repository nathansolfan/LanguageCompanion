<form action="/settings" method="POST">
    @csrf
    <label for="native_lang">Select Your Native Language:</label>
    <select name="native_lang" id="native_lang">
        <option value="en">English</option>
        <!-- Add more languages as needed -->
    </select>

    <label for="target_lang">Select Your Target Language:</label>
    <select name="target_lang" id="target_lang">
        <option value="es">Spanish</option>
        <!-- Add more languages as needed -->
    </select>

    <button type="submit">Save Settings</button>
</form>
