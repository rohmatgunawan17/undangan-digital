<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvitationController extends Controller
{
    public function show(Request $request, $sid, $tid)
    {
        // basic sample data inspired by the provided example
        $recipient = $request->query('kpd', null);
        $contoh = $request->query('contoh', 0);

        $data = [
            'couple' => ['Tobias Justin', 'Sisca Chol'],
            'hero_image' => 'https://indoinvite.com/nikah/template/pandora/pandora-classic/PC-Bor.webp',
            'quote_ar' => "وَمِنْ اٰيٰتِهٖٓ اَنْ خَلَقَ لَكُمْ مِّنْ اَنْفُسِكُمْ اَزْوَاجًا\n...",
            'events' => [
                ['title' => 'Akad Pernikahan', 'date' => 'Rabu, 18 Februari 2026', 'time' => '02:39 WIB - 08:00 WIB', 'location' => 'Jalan gunung batur, no 78, Denpasar, Bali'],
                ['title' => 'Resepsi Pernikahan', 'date' => 'Sabtu, 4 Maret 2025', 'time' => 'Jam Bebas', 'location' => 'Rumah Justin di Jakarta']
            ],
            'gallery' => [
                'https://media.indoinvite.com/indoinvite-staging/nikah/upload/galery/1679297398.jpeg',
                'https://media.indoinvite.com/indoinvite-staging/nikah/upload/galery/1677249254.jpeg',
            ],
            'banks' => [
                ['name' => 'BCA', 'number' => '12345678', 'owner' => 'Sisca Kohl'],
                ['name' => 'Sinarmas', 'number' => '0982309823', 'owner' => 'Tobias Justin']
            ],
        ];

        return view('invite_template', array_merge($data, ['recipient' => $recipient, 'contoh' => $contoh, 'sid' => $sid, 'tid' => $tid]));
    }

    public function rsvp(Request $request, $sid, $tid)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'attendance' => 'required|in:hadir,tidak',
            'message' => 'nullable|string|max:500',
        ]);

        $entry = [
            'sid' => $sid,
            'tid' => $tid,
            'name' => $data['name'],
            'attendance' => $data['attendance'],
            'message' => $data['message'] ?? null,
            'created_at' => now()->toDateTimeString(),
        ];

        $path = 'rsvps/' . $sid . '_' . $tid . '.json';
        $existing = [];
        if (Storage::exists($path)) {
            $existing = json_decode(Storage::get($path), true) ?: [];
        }
        $existing[] = $entry;
        Storage::put($path, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return back()->with('rsvp_success', 'Terima kasih, kehadiran Anda sudah tercatat.');
    }
}
