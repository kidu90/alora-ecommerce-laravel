import 'package:json_annotation/json_annotation.dart';

part 'product.g.dart';

@JsonSerializable()
class Product {
  final int id;
  final String name;
  final String? description;
  final double price;
  final int stock;
  final String? ingredients;
  final String? usageTips;
  final String? image;
  final int categoryId;

  Product({
    required this.id,
    required this.name,
    this.description,
    required this.price,
    required this.stock,
    this.ingredients,
    this.usageTips,
    this.image,
    required this.categoryId,
  });

  factory Product.fromJson(Map<String, dynamic> json) => _$ProductFromJson(json);
  Map<String, dynamic> toJson() => _$ProductToJson(this);
}