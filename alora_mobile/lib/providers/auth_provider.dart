import 'package:flutter/material.dart';
import 'package:flutter_secure_storage.dart';
import 'package:alora_mobile/services/api_service.dart';

class AuthProvider extends ChangeNotifier {
  final _storage = const FlutterSecureStorage();
  String? _token;
  Map<String, dynamic>? _user;

  bool get isAuthenticated => _token != null;
  Map<String, dynamic>? get user => _user;

  Future<void> login(String email, String password) async {
    try {
      final response = await ApiService.post('/login', {
        'email': email,
        'password': password,
      });

      _token = response['token'];
      _user = response['user'];
      await _storage.write(key: 'token', value: _token);
      notifyListeners();
    } catch (e) {
      rethrow;
    }
  }

  Future<void> register(String name, String email, String password) async {
    try {
      final response = await ApiService.post('/register', {
        'name': name,
        'email': email,
        'password': password,
        'password_confirmation': password,
      });

      _token = response['token'];
      _user = response['user'];
      await _storage.write(key: 'token', value: _token);
      notifyListeners();
    } catch (e) {
      rethrow;
    }
  }

  Future<void> logout() async {
    await _storage.delete(key: 'token');
    _token = null;
    _user = null;
    notifyListeners();
  }

  Future<void> checkAuth() async {
    _token = await _storage.read(key: 'token');
    if (_token != null) {
      try {
        final response = await ApiService.get('/user');
        _user = response;
        notifyListeners();
      } catch (e) {
        await logout();
      }
    }
  }
}