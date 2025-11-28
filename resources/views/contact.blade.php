<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact Us</title>

    <!-- Tailwind CSS CDN (NO NODE REQUIRED) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Optional Font -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        body { font-family: 'figtree', sans-serif; }
    </style>
</head>

<body class="bg-gray-900 font-sans text-gray-100">
    <div class="min-h-screen py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-white mb-4">Contact Us</h1>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    Have questions or feedback? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Contact Information -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700">
                        <h2 class="text-xl font-semibold text-white mb-6">Get in Touch</h2>

                        <div class="space-y-6">

                            <!-- Email -->
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-medium mb-1">Email</h3>
                                    <p class="text-gray-400">support@storyhub.com</p>
                                </div>
                            </div>

                            <!-- Response Time -->
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-medium mb-1">Response Time</h3>
                                    <p class="text-gray-400">Within 24 hours</p>
                                </div>
                            </div>

                            <!-- Support -->
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-medium mb-1">Support</h3>
                                    <p class="text-gray-400">24/7 Available</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="bg-gray-800 rounded-2xl p-8 border border-gray-700">

                        @if(session('success'))
                        <div class="mb-6 p-4 bg-green-500/20 border border-green-500/30 rounded-lg">
                            <div class="flex items-center">
                                <p class="text-green-400 font-medium">{{ session('success') }}</p>
                            </div>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                            @csrf

                            <!-- Full Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                                    Full Name
                                </label>
                                <input type="text" name="name" id="name" required
                                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                                    Email Address
                                </label>
                                <input type="email" name="email" id="email" required
                                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-300 mb-2">
                                    Your Message
                                </label>
                                <textarea name="message" id="message" rows="6" required
                                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 resize-vertical"
                                    placeholder="Tell us how we can help you..."></textarea>
                                @error('message')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-semibold transition">
                                Send Message
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Extra Info -->
            <div class="mt-12 text-center">
                <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700">
                    <h3 class="text-lg font-semibold text-white mb-2">Need Immediate Help?</h3>
                    <p class="text-gray-400 mb-4">Check out our frequently asked questions or join our community forum.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:text-blue-400 hover:border-blue-400 transition">
                            FAQ
                        </a>
                        <a href="#" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:text-green-400 hover:border-green-400 transition">
                            Community Forum
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
